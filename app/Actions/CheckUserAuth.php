<?php

namespace App\Actions;

use App\Models\Garden;
use App\Models\Plant;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserAuth
{
	protected $userUuid;


	public function __invoke(Model|Garden|Plot|Plant|Collection $model): bool
	{
		if(is_null($this->userUuid)) {
			$this->userUuid = Auth::user()->uuid;
		}

		$users = match (get_class($model)) {
			'App\\Models\\User' => $model,
			'App\\Models\\Garden' => $model->users()->get(),
			'App\\Models\\Plot' => $model->garden()->first()->users()->get(),
			// 'App\\Models\\Plant' => '',
			// 'App\\Models\\PlantCare' => '',
			// 'App\\Models\\Harvest' => '',
			// 'App\\Models\\Reminder' => '',
			default => abort(403, Response::$statusTexts[403]),
		};

		return $this->checkUsers($users);
	}


	protected function checkUsers(User|Collection $user) {
		if($user instanceof Collection) {
			foreach($user as $_user) {
				$this->checkUser($_user);
			}

			return true;
		}

		return $this->checkUser($user);
	}


	protected function checkUser(User $user) {
		if($user->uuid == $this->userUuid) {
			return true;
		}

		abort(403, Response::$statusTexts[403]);
	}
}
