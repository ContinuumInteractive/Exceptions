<?php

namespace Continuum\Exceptions\Handlers;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class LaravelExceptionHandler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Instantiate
     *
     * @return  void
     */
    public function __construct()
    {
        parent::__construct(app());
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return parent::unauthenticated($request, $exception);
    }

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        return parent::render($request, $e);
    }

    /**
     * Generate a Log ID on each request.
     *
     * @return void
     */
    // protected function generateLogId()
    // {
    //     return uniqid('lid:'.str_random(6).':');
    // }

    /**
     * Create a Symfony response for the given exception.
     *
     * @param  \Exception  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    // protected function convertExceptionToResponse(Exception $e)
    // {
    //     if ($this->shouldNotReport()) {
    //         return parent::convertExceptionToResponse($e);
    //     }

    //     return $this->compileExceptionResponse($e);
    // }

    // /**
    //  * Compile the new final excpetion response and print.
    //  *
    //  * @param  Exception $e
    //  * @return Illuminate\Http\Response
    //  */
    // protected function compileExceptionResponse(Exception $e)
    // {
    //     if ($this->shouldRedirectTokenMismatch($e)) {
    //         return redirect()->back()->with('errors', lang('exceptions.token_redirect'));
    //     }

    //     $exception = FlattenException::create($e);
    //     $status = $exception->getStatusCode();

    //     if (view()->exists("errors.{$status}")) {
    //         try {
    //             $payload = ['exception' => $exception, 'log_id' => $this->log_id];

    //             return response()->view("errors.{$status}", $payload, $status, $exception->getHeaders());
    //         } catch (Exception $e) {
    //             //...
    //         }
    //     }

    //     return parent::convertExceptionToResponse($e);
    // }

    // /**
    //  * Should the app redirect on a token mismatch exception.
    //  *
    //  * @param  Exception $e
    //  * @return bool
    //  */
    // protected function shouldRedirectTokenMismatch(Exception $e)
    // {
    //     $redirect = config('exceptions.token_redirect', false);

    //     return $redirect && $e instanceof TokenMismatchException;
    // }

    // /**
    //  * Check if the app should report or print.
    //  *
    //  * @return bool
    //  */
    // protected function shouldNotReport()
    // {
    //     return (bool) config('app.debug', false);
    // }

    // /**
    //  * Setup the bugsnag report.
    //  *
    //  * @param  Exception $e
    //  * @return void
    //  */
    // protected function setupBugsnag(Exception $e)
    // {
    //     app('exceptions.bugsnag')
    //         ->setType(config('exceptions.app_type', 'N/A'))
    //         ->setAppVersion(config('exceptions.app_version', 'N/A'))
    //         ->setBeforeNotifyFunction(function ($error) {
    //             $error->setMetaData([
    //                 'user' => $this->getUser(),
    //                 'ci_sessions' => $this->getCISession(),
    //             ]);
    //         });
    // }

    // /**
    //  * Get additional session data.
    //  *
    //  * @return array
    //  */
    // protected function getCISession()
    // {
    //     return [
    //         'log_id' => $this->log_id,
    //     ];
    // }

    // /**
    //  * Get the user.
    //  *
    //  * @return array
    //  */
    // protected function getUser()
    // {
    //     return Auth::user() ? Auth::user()->toArray() : [];
    // }
}
