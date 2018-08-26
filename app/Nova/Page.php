<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\MorphMany;
use Benjaminhirsch\NovaSlugField\Slug;
use Laravel\Nova\Http\Requests\NovaRequest;
use Vexilo\NovaFroalaEditor\NovaFroalaEditor;
use Benjaminhirsch\NovaSlugField\TextWithSlug;

class Page extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\\Models\\Page';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
    ];

    /**
     * The editor options
     *
     * @var array
     */
    public $editorOptions = [
        'height' => 350,
        'width' => 900,
        'tooltips' => false,
        'toolbarButtons' => ['paragraphFormat','bold','italic','strikeThrough','underline','quote','color','fontSize','|','insertLink','align','formatUL','formatOL','|','emoticons','insertImage','insertVideo','|','clearFormatting','html'],
        'imageUpload' => false,
        'videoUpload' => false,
        'fileUpload' => false,
        'emoticonsUseImage' => true,
        'htmlExecuteScripts' => false,
        'pastePlain' => true,
        'charCounterCount' => false,
        'entities' => '',
        'imageInsertButtons' => ['imageBack', '|', 'imageUpload', 'imageByURL'],
        'quickInsertButtons' => ['video', 'ul', 'ol'],
        'colorsText' => [
            '#61BD6D', '#1ABC9C', '#54ACD2', '#385f85', '#9365B8', '#475577', '#CCCCCC',
            '#5f917c', '#00A885', '#3D8EB9', '#2969B0', '#553982', '#28324E', '#000000',
            '#F7DA64', '#e38229', '#EB6B56', '#E25041', '#A38F84', '#DDDDDD', '#EEEEEE',
            '#FAC51C', '#F37934', '#D14841', '#B8312F', '#7C706B', '#D1D5D8', '#FFFFFF'
        ]
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            TextWithSlug::make('Title')->sortable()->slug('Slug')->rules('required'),
            Slug::make('Slug')->rules('required'),
            BelongsTo::make('User', 'author'),
            NovaFroalaEditor::make('Body')->options($this->editorOptions)->rules('required'),
            Boolean::make('Active')->sortable(),
            DateTime::make('Published At'),
            MorphMany::make('Images'),
            HasMany::make('Fields'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
