<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Comment;
use App\Category;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Article::truncate();
        Comment::truncate();
        Category::truncate();
        DB::table('categories')->insert([
            'category' => 'Health'
        ]);

        DB::table('categories')->insert([
            'category' => 'Business'
        ]);

        DB::table('categories')->insert([
            'category' => 'Abroad'
        ]);

        DB::table('categories')->insert([
            'category' => 'Cars'
        ]);

        DB::table('categories')->insert([
            'category' => 'Criminal'
        ]);

        DB::table('categories')->insert([
            'category' => 'Sport'
        ]);
        DB::table('articles')->insert([
            'title' => 'Latvijā nav konstatēti jauni Covid-19 gadījumi',
            'author' => 'Jurijs Šļuncevs',
            'categories_id' => 1,
            'brief_desc' => 'Aizvadītajā diennaktī Latvijā nav konstatēti jauni Covid-19 saslimšanas gadījumi, liecina Slimību profilakses un kontroles centra apkopotā informācija.',
            'content' => 'Pēdējās 24 stundās veikti kopumā 1396 Covid-19 testi, un jauni saslimšanas gadījumi nav reģistrēti. Taču ir stacionēts viens pacients ar Covid-19, liecina Nacionālā veselības dienesta dati. Līdz ar to stacionāros ārstējas kopumā septiņi Covid-19 pacienti - seši ar vidēji smagu, viens ar smagu slimības gaitu. Kopā no stacionāra izrakstīti 170 pacienti. Līdz šim Latvijā kopā veikti 127 450 izmeklējumi uz Covid-19, saslimuši 1097 cilvēki, 845 izveseļojušies, bet 28 miruši.',
            'image' => 'http://newsportal.final/images/2.jpg'
        ]);

        $article = new Article();
        $article->title = 'Londonā vardarbīgos protestos aizturēti vairāk nekā 100 cilvēki';
        $article->author = 'Jurijs Šļuncevs';
        $article->categories_id = 7;
        $article->brief_desc = 'Londonas policija paziņojusi, ka aizturējusi vairāk nekā 100 cilvēkus, kad ultralabējie protestētāji, kas rīkoja kontrdemonstrāciju pret pretrasisma aktīvistiem, iesaistījās sadursmēs ar policistiem.';
        $article->content = 'Londonas policija paziņojusi, ka aizturējusi vairāk nekā 100 cilvēkus, kad ultralabējie protestētāji, kas rīkoja kontrdemonstrāciju pret pretrasisma aktīvistiem, iesaistījās sadursmēs ar policistiem.

Tūkstošiem cilvēku ignorēja koronavīrusa dēļ ieviestos ierobežojumus, pulcējoties Parlamenta laukumā Londonas centrā.

Televīzijas demonstrētajās ainās redzams, ka protestētāji kaujas policistiem un pretējās nometnes aktīvistiem, kā arī apmētā likumsargus ar pudelēm un dūmu svecēm.

Policija līdz sestdienas vakaram bija aizturējusi vairāk nekā 100 cilvēkus. Seši policisti guvuši vieglus ievainojumus.

Premjerministrs Boriss Džonsons paziņoja "rasistiskiem bandītiem nav vietas mūsu ielās un ka ikviens, kas uzbrūk policistiem, saskarsies ar visu likuma varu".
';
        $article->image = 'http://newsportal.final/images/1.jpg';
        $article->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
