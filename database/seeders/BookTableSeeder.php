<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert(
            [
                [
                    'title' => 'Le città invisibili',
                    'description' => "Un'opera visionaria in cui Marco Polo descrive all’imperatore Kublai Khan una serie di città fantastiche. Ogni città rappresenta un’immagine, una metafora della complessità dell’esistenza umana e della relazione tra spazio e tempo.",
                    'pages' => 165,
                    'author_id' => 3,
                    'category_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => "Harry Potter and the Philosopher's Stone",
                    'description' => "Primo volume della celebre saga di Harry Potter. Narra le avventure del giovane mago Harry Potter, che scopre di essere un mago e di frequentare la scuola di magia di Hogwarts, dove affronta misteri legati alla sua nascita e al malvagio Voldemort.",
                    'pages' => 223,
                    'author_id' => 1,
                    'category_id' => 2,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'title' => "Divina Commedia: Inferno",
                    'description' => "La prima cantica della \"Divina Commedia\", dove Dante Alighieri narra il suo viaggio attraverso l’Inferno, guidato dal poeta Virgilio. L'opera è una rappresentazione allegorica dell'anima umana in cerca di redenzione e giustizia.",
                    'pages' => 414,
                    'author_id' => 2,
                    'category_id' => 4,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]
        );
    }
}
