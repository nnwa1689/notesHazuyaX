<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Services\BaseService;

class Handler extends ExceptionHandler
{
    protected $baseService;

    public function __construct(BaseService $baseService) 
    {
        $this -> baseService = $baseService;
    }

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {

        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                $webData = $this -> baseService ->WebInit();
                return response()->view('errors.' . '404', ['webData' => $webData ], 404);
            } else {
                $webData = $this -> baseService ->WebInit();
                return response()->view('errors.' . '500', ['webData' => $webData ], 500);
            }
        } else {
            $webData = $this -> baseService ->WebInit();
            return response()->view('errors.' . '500', ['webData' => $webData ], 500);
        }

        //return parent::render($request, $exception);
    }
}
