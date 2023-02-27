<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReplaceStatusResponse
{
	public function handle(Request $request, Closure $next):mixed {
		/** @var Response|JsonResponse $response */
		$response = $next($request);

		if ($request->acceptsJson() && !$request->acceptsHtml()) {
			return $this->replaceStatus($response);
		}

		return $response;
	}


	protected function replaceStatus(Response|JsonResponse $response):Response|JsonResponse {
		$is_debug = env('APP_DEBUG') && env('APP_ENV') !== 'production';
		$status_code = $response->getStatusCode();
		$message = $response?->exception?->getMessage();

		if($status_code >= 400 && $status_code < 500) {
			$status_code = 422;
		}

		if($status_code == 422) {
			$result = [
				'error' => [
					'message' => $message,
					'type' => $response?->exception ? class_basename($response?->exception) : '',
				]
			];

			if($is_debug) {
				$result['error']['debug'] = $this->appendTrace($response);
			}

			$result = json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PARTIAL_OUTPUT_ON_ERROR);

			return $response->setStatusCode(422)->setContent($result);
		}

		return $response;
	}


	protected function appendTrace(Response|JsonResponse $response):array {
		$exception = $response->exception ?? null;
		$error = [];

		if ($exception) {
			$error = [
				'file'	=> $exception->getFile(),
				'line'	=> $exception->getLine(),
				'message' => $exception->getMessage(),
				'trace'   => $exception->getTrace(),
			];
		}

		return $error;
	}
}
