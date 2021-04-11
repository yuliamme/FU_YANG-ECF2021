<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
      DB::table('animes')->insert([
        'title' => 'Hunter X Hunter',
        'description' => 'Gon rêve de devenir hunter, un aventurier d\'élite. Son père Jin est considéré comme le plus grand hunter de son temps. Gon veut aussi le retrouver.',
        'cover' => 'hunter.jpg',
      ]);
      DB::table('animes')->insert([
        'title' => 'L\'attaque des Titans',
        'description' => 'Dans un monde ravagé par des titans mangeurs d’homme, les rares survivants n’ont d’autre choix pour vivre que de se cloîtrer dans une cité-forteresse.',
        'cover' => 'titans.jpg',
      ]);
      DB::table('animes')->insert([
        'title' => 'Lastman',
        'description' => 'Richard Aldana, boxeur assez paresseux, doit prendre soin de la fille de son coach, assassiné par un ordre mystérieux.',
        'cover' => 'lastman.png',
      ]);
      DB::table('animes')->insert([
        'title' => 'Cowboy Bebop',
        'description' => '2071. Spike Spiegel et Jet Black, chasseurs de primes fauchés, errent dans l\'espace au gré de leurs missions et dans une ambiance plutôt "Seventies".',
        'cover' => 'cowboy.webp',
      ]);
      DB::table('animes')->insert([
        'title' => 'Dragon Ball Z',
        'description' => 'Cinq années se sont écoulées depuis que Songoku a vaincu Satan Petit Coeur Junior. Mais un danger menace la terre. Un guerrier du nom de Raditz.',
        'cover' => 'dbz.webp',
      ]);
      DB::table('animes')->insert([
        'title' => 'Samurai Champloo',
        'description' => 'Fuu est à la recherche du samurai qui sent le tournesol. Après avoir sauvé Mugen et Jin, elle arrive à les convaincre de l\'aider dans sa quête.',
        'cover' => 'samurai.jpg',
      ]);
      DB::table('animes')->insert([
        'title' => 'GTO - Great Teacher Onizuka',
        'description' => 'Onizuka, un ancien loubard, se met en tête de devenir un grand professeur avec sa vision très personnelle de l\'éducation... ',
        'cover' => 'gto.jpg',
      ]);

        DB::table('animes')->insert([
            'title' => 'a meme',
            'description' => 'this is a meme... not an anime',
            'cover' => 'meme.png',
        ]);




      DB::table('users')->insert([
            'username' => 'toto',
            'password' => 'toto',
        ]);

      DB::table('users')->insert([
            'username' => 'coco',
            'password' => 'coco',
        ]);

      DB::table('reviews')->insert([
            'rating' => 4,
            'comment' => 'a random seed comment toto',
            'user_id' => 1,
            'anime_id' => 1,
            'created_at' => '2019-03-03 08:30:20',
        ]);

      DB::table('reviews')->insert([
            'rating' => 3,
            'comment' => 'some random seed comment blah coco',
            'user_id' => 2,
            'anime_id' => 1,
          'created_at' => '2022-03-03 15:30:20',
        ]);

      DB::table('reviews')->insert([
            'rating' => 2,
            'comment' => 'a random seed comment lalala toto',
            'user_id' => 1,
            'anime_id' => 2,
          'created_at' => '2021-04-09 08:30:20',
        ]);

        DB::table('reviews')->insert([
            'rating' => 4,
            'comment' => 'a random seed comment lalala coco',
            'user_id' => 2,
            'anime_id' => 2,
            'created_at' => '2021-04-09 08:30:20',
        ]);

        DB::table('reviews')->insert([
            'rating' => 9,
            'comment' => 'i want a meme coco',
            'user_id' => 2,
            'anime_id' => 8,
            'created_at' => '2021-04-09 12:50:20',
        ]);
    }
}
