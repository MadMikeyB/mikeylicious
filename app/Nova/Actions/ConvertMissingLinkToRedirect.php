<?php

namespace App\Nova\Actions;

use App\Models\Redirect;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConvertMissingLinkToRedirect extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            Redirect::updateOrCreate(
                [
                    'old_url' => str_replace(env('APP_URL'), '', $model->url)
                ],
                [
                    'old_url' => str_replace(env('APP_URL'), '', $model->url),
                    'new_url' => str_replace(env('APP_URL'), '', $fields->new_url)
                ]
            );
            $model->delete();
            return Action::message('Redirect created for '. $model->url);
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
            Text::make('New URL', 'new_url'),
        ];
    }
}
