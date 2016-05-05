<?php

use App\Models\Article;
use App\Models\Permission;
use App\Models\Section;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;
use App\Models\Style;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersSeeder');
        $this->command->info('Users table seeded!');

        $this->call('PagesSeeder');
        $this->command->info('Pages table seeded!');

        $this->call('SectionsSeeder');
        $this->command->info('Sections table seeded!');

        $this->call('ArticlesSeeder');
        $this->command->info('Articles table seeded!');

        $this->call('StylesSeeder');
        $this->command->info('Styles table seeded!');

        $this->call('PermissionsSeeder');
        $this->command->info("Permissions table seeded!");

        $this->call('setPermissionsSeeder');
        $this->command->info('permission_user table seeded!');

        $this->call('setPageSectionsSeeder');
        $this->command->info('page_permission table seeded!');

        $this->call('setSectionArticlesSeeder');
        $this->command->info('article_section table seeded!');
    }
}

class PagesSeeder extends Seeder {

    public function run()
    {
        DB::table('pages')->delete();

        Page::create([
            'name' => 'Home',
            'slug' => 'home',
            'desc' => 'The home page for the website.',
            'on_nav' => true,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Page::create([
            'name' => 'Articles',
            'slug' => 'articles',
            'desc' => 'List of published articles.',
            'on_nav' => true,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Page::create([
            'name' => 'About',
            'slug' => 'about',
            'desc' => 'Page describing who we are.',
            'on_nav' => true,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}

class SectionsSeeder extends Seeder {

    public function run () {
        DB::table('sections')->delete();

        Section::create([
            'name' => 'Welcome',
            'alias' => 'welcome',
            'header' => null,
            'order' => 2,
            'all_pages' => false,
            'desc' => 'The welcome message on the home page.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Section::create([
            'name' => 'Article List',
            'alias' => 'article-list',
            'header' => null,
            'order' => 2,
            'all_pages' => false,
            'desc' => 'The list of articles.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Section::create([
            'name' => 'Spotlight',
            'alias' => 'spotlight',
            'header' => 'New!',
            'order' => 1,
            'all_pages' => false,
            'desc' => 'Highlight an article or other news.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Section::create([
            'name' => 'About',
            'alias' => 'about',
            'header' => null,
            'order' => 2,
            'all_pages' => false,
            'desc' => 'That about section thing.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Section::create([
            'name' => 'Footer',
            'alias' => 'footer',
            'header' => null,
            'order' => 10,
            'all_pages' => true,
            'desc' => 'At the bottom of EVERY page.',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}

class ArticlesSeeder extends Seeder {

    public function run()
    {
        DB::table('articles')->delete();

        Article::create([
            'name' => 'Welcome',
            'title' => 'Welcome',
            'desc' => 'The greeting in the welcome section.',
            'html' => '<h1>Welcome to The Site</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus purus sed mi tempor tristique. Suspendisse venenatis molestie fermentum. Fusce aliquam nulla sit amet iaculis volutpat.<br/><br/>Etiam laoreet, dolor id luctus congue, neque sem consectetur mi, ut pellentesque enim massa sit amet leo. Cras ut lorem mi. Praesent non diam ultrices, efficitur felis ut, iaculis quam. Fusce suscipit auctor dictum. Pellentesque efficitur lacus viverra mi bibendum condimentum. Duis malesuada est vitae metus mattis, eget ornare mi dignissim.</p>',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Article::create([
            'name' => 'Article 1',
            'title' => 'Farewell',
            'desc' => 'The first article.',
            'html' => '<h1>And So It Begins</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus purus sed mi tempor tristique. Suspendisse venenatis molestie fermentum. Fusce aliquam nulla sit amet iaculis volutpat.<br/>Etiam laoreet, dolor id luctus congue, neque sem consectetur mi.</p>',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Article::create([
            'name' => 'Article 2',
            'title' => 'Article 2',
            'desc' => 'The sand in the shoes story.',
            'html' => '<h1>So Much Sand in the Shoes</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus purus sed mi tempor tristique. <br/><br/>Suspendisse venenatis molestie fermentum. Fusce aliquam nulla sit amet iaculis volutpat.<br/><br/>Etiam laoreet, dolor id luctus congue, neque sem consectetur mi, ut pellentesque enim massa sit amet leo. Cras ut lorem mi. Praesent non diam ultrices, efficitur felis ut, iaculis quam. Fusce suscipit auctor dictum. Pellentesque efficitur lacus viverra mi bibendum condimentum. Duis malesuada est vitae metus mattis, eget ornare mi dignissim.</p>',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Article::create([
            'name' => 'Article 3',
            'title' => 'Article 3',
            'desc' => 'The switch to bare feet because of the all the sand!',
            'html' => '<h1>The Switch to Bare feet</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus purus sed mi tempor tristique. Suspendisse venenatis molestie fermentum. Fusce aliquam nulla sit amet iaculis volutpat.<br/>Etiam laoreet, dolor id luctus congue, neque sem consectetur mi, ut pellentesque enim massa sit amet leo. Cras ut lorem mi. Praesent non diam ultrices, efficitur felis ut, iaculis quam. Fusce suscipit auctor dictum. Pellentesque efficitur lacus viverra mi bibendum condimentum. Duis malesuada est vitae metus mattis, eget ornare mi dignissim.</p>',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Article::create([
            'name' => 'Article 4',
            'title' => 'Article 4',
            'desc' => 'The cost of bare feet.',
            'html' => '<h1>The Mighty Splinter</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus purus sed mi tempor tristique. Suspendisse venenatis molestie fermentum. Fusce aliquam nulla sit amet iaculis volutpat.<br/>Etiam laoreet, dolor id luctus congue, neque sem consectetur mi, ut pellentesque enim massa sit amet leo. Cras ut lorem mi. Praesent non diam ultrices, efficitur felis ut, iaculis quam. Fusce suscipit auctor dictum. Pellentesque efficitur lacus viverra mi bibendum condimentum. Duis malesuada est vitae metus mattis, eget ornare mi dignissim.</p>',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Article::create([
            'name' => 'About',
            'title' => 'About',
            'desc' => 'Content for the about page',
            'html' => '<h1>About</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rhoncus purus sed mi tempor tristique. Suspendisse venenatis molestie fermentum. Fusce aliquam nulla sit amet iaculis volutpat.<br/>Etiam laoreet, dolor id luctus congue, neque sem consectetur mi, ut pellentesque enim massa sit amet leo. Cras ut lorem mi. Praesent non diam ultrices, efficitur felis ut, iaculis quam. Fusce suscipit auctor dictum. Pellentesque efficitur lacus viverra mi bibendum condimentum. Duis malesuada est vitae metus mattis, eget ornare mi dignissim.</p>',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Article::create([
            'name' => 'Footer Notes',
            'title' => 'Footer Notes',
            'desc' => 'The content in the footer',
            'html' => '<h4>The End!</h4>',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

    }
}

class StylesSeeder extends Seeder {

    public function run()
    {
        DB::table('styles')->delete();

        Style::create([
            'name' => 'Midnight Blue',
            'desc' => 'A dark theme',
            'css' =>
                '*{color:white; margin:0;padding:0;}
a {color: white}
header{
min-height: 60px;
position: relative;
background-color: black;
}
header h1{position:absolute; left:6px;}
nav ul {
list-style: none;
position: absolute;
right: 6px;
bottom: 7px;
}
nav li {
display: inline-block;
padding: 0 10px;
}

body {
width:100%;
max-width:1280px;
padding: 0 10.9375%;
background: grey; }

#footer{
background: black;
text-align:center;
padding: 5px 0;
}

#spotlight {
padding: 0 10px;
width: 30.2%;
margin-right: 3%;
background-color: blue;
display: inline-block;
}

section{
background-color: DarkBlue;
clear:both;
}

#welcome, #article-list, #about {
width: 62%;
display: inline-block;
vertical-align: top;
}
                ',
            'active' => true,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Style::create([
            'name' => 'Superhero',
            'desc' => 'A light theme.',
            'css' => '
*{color:black; margin:0;padding:0;}
a{color:black; font-weight:bold;}
header{
min-height: 60px;
position: relative;
background-color: red;
}
header h1{position:absolute; left:6px;}
nav ul {
list-style: none;
position: absolute;
right: 6px;
bottom: 7px;
}
nav li {
display: inline-block;
padding: 0 10px;
}

body {
width:100%;
max-width:1280px;
padding: 0 10.9375%;
background: white; }

#footer{
background: black;
color: white;
text-align:center;
padding: 5px 0;
}

#spotlight {
padding: 0 10px;
width: 30.2%;
margin-right: 3%;
background-color: wheat;
display: inline-block;
}

section{
background-color: whitesmoke;
clear:both;
}

#welcome, #article-list, #about {
width: 62%;
display: inline-block;
vertical-align: top;
}
            ',
            'active' => false,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

    }
}

class UsersSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'first_name' => 'WEB',
            'last_name' => 'MASTER',
            'email' => 'webmaster@site.com',
            'password' => Hash::make('password'),
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'created_by' => 1,
            'updated_by' => 1
        ]);

        User::create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'created_by' => 1,
            'updated_by' => 2,
        ]);

        User::create([
            'first_name' => 'James',
            'last_name' => 'Doe',
            'email' => 'james@example.com',
            'password' => Hash::make('password'),
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}

class PermissionsSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();

        Permission::create([
            'name' => 'admin'
        ]);

        Permission::create([
            'name' => 'editor'
        ]);

        Permission::create([
            'name' => 'author'
        ]);
    }
}

class setPermissionsSeeder extends Seeder {

    public function run()
    {
        User::find(1)->permissions()->attach([1,2,3]);
        User::find(2)->permissions()->attach(1);
        User::find(3)->permissions()->attach(2);
        User::find(4)->permissions()->attach(3);
    }

}

class setPageSectionsSeeder extends Seeder
{
    public function run()
    {
        Section::find(1)->pages()->attach([1]);
        Section::find(2)->pages()->attach([2]);
        Section::find(3)->pages()->attach([1,2,3]);
        Section::find(4)->pages()->attach([3]);
    }
}

class setSectionArticlesSeeder extends Seeder
{
    public function run()
    {
        Article::find(1)->sections()->attach([1]);
        Article::find(2)->sections()->attach([2]);
        Article::find(3)->sections()->attach([2]);
        Article::find(4)->sections()->attach([2]);
        Article::find(5)->sections()->attach([2,3]);
        Article::find(6)->sections()->attach([4]);
        Article::find(7)->sections()->attach([5]);

    }
}