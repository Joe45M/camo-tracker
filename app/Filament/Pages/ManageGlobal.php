<?php

namespace App\Filament\Pages;

use App\Models\Post;
use App\Settings\GlobalSettings;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageGlobal extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = GlobalSettings::class;

    public function form(Form $form): Form
    {


        return $form
            ->schema([
                Forms\Components\CheckboxList::make('home_posts')->options($this->getPosts())
            ]);
    }

    public function getPosts()
    {
        $posts = Post::all();

        $collection = [];

        foreach ($posts as $post) {
            $collection[$post->id] = $post->title;
        }

        return $collection;

    }
}
