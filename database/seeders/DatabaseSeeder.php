<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Plan;
use App\Models\Article;
use App\Models\Comentari;
use App\Models\Cesta;
use App\Models\Cesta_line;
use App\Models\Comanda;
use App\Models\Comanda_line;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       /* $userMaster=User::create([
            'username' => 'superadmin',
            'email' => 'vguitart6@gmail.com',
            'password' => Hash::make('1234'),
        ]);*/
        
        $this->seedUsers();
        $this->command->info('Seed Users');
        $this->seedPlans();
        $this->command->info('Seed Plans');
        $this->seedArticle();
        $this->command->info('Seed Articles');
        $this->seedComentaris();
        $this->command->info('Seed Comentaris');

    }

    public function seedUsers() {
            foreach($this->arrayUsers as $user) {
            $a = new User;
            $a->id = $user['id'];
            $a->username = $user['username'];
            $a->email = $user['email'];
            $a->password = Hash::make($user['password']);
            $a->save();

        }
    }

    public function seedPlans(){

        foreach( $this->arrayPlans as $pla ) {
            $a = new Plan;
            $a->user_id = $pla['user_id'];
            $a->preu = $pla['preu'];
            $a->name = $pla['name'];
            $a->text = $pla['text'];
            $a->save();
        }
    }

    public function seedArticle(){

        foreach( $this->arrayArticles as $art ) {
            $a = new Article;
            $a->user_id = $art['user_id'];
            $a->name = $art['name'];
            $a->text = $art['text'];
            $a->save();
        }
    }

    public function seedComentaris(){
        foreach( $this->arrayComentaris as $com ) {
            $a = new Comentari;
            $a->text = $com['text'];
            $a->user_id = $com['user_id'];
            $a->article_id = $com['article_id'];
            $a->save();
        }
    }

    private $arrayComentaris = array(
        array(
            'text' => 'No mola',
            'user_id' => 1,
            'article_id' => 1,
        ),
        array(
            'text' => 'io q se',
            'user_id' => 1,
            'article_id' => 1,
        )
    );
    

    private $arrayArticles = array(
        array(
            'user_id' => 1,
            'name' => 'Lorem Ipsum 1',
            'text' => 'Aenean ipsum quam, facilisis ut rutrum quis, finibus at turpis. Morbi porta nulla nec neque porta mollis. Duis pretium eu tortor a dignissim. Nullam vel lobortis lectus. Morbi sed velit at metus sagittis efficitur gravida ac nulla. In id metus sit amet risus vulputate mollis id et nulla. Morbi risus turpis, tempus ac interdum vitae, tempor id orci. Vivamus finibus sem vitae nulla ultrices porttitor. Phasellus imperdiet faucibus placerat. Nunc eu ex eleifend ipsum interdum ultrices. Mauris elementum quam at ullamcorper laoreet. Praesent egestas ipsum ac tortor accumsan, vitae rutrum nunc hendrerit. Nunc eu enim euismod, porttitor diam elementum, tempus risus. Integer sit amet feugiat arcu. Maecenas ullamcorper, nibh a imperdiet pellentesque, quam est gravida tortor, vitae tempus nulla lacus aliquet dui. Vestibulum bibendum aliquam fermentum.
                       Phasellus ut placerat diam. Sed eu urna id dolor laoreet tincidunt ac ultricies turpis. Pellentesque efficitur neque sed elementum semper. Morbi ultricies nunc nec commodo fringilla. Aenean feugiat, orci eu molestie elementum, mauris mi efficitur tortor, ac finibus lacus leo volutpat elit. Phasellus ut massa sed dolor vehicula fermentum sed sit amet arcu. Ut nec ante mauris. Sed quis consectetur ligula. Duis in accumsan turpis. Donec quis sapien pulvinar sapien blandit venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
        ),
        array(
            'user_id' => 1,
            'name' => 'Un latin aqui random',
            'text' => 'Proin nisi turpis, pretium in ultricies non, consequat at elit. Sed egestas, enim viverra pellentesque fringilla, enim justo aliquam libero, aliquam efficitur urna libero vitae orci. Maecenas vestibulum vitae dui nec interdum. Nunc suscipit tristique lectus. Sed ac tincidunt ipsum. Etiam eleifend ipsum a blandit ultrices. Sed volutpat id augue et egestas. Sed tincidunt ullamcorper odio, ut convallis lorem interdum id. In laoreet blandit tortor vel dictum. Cras laoreet ligula eget tortor malesuada ullamcorper. Pellentesque dignissim tempus turpis, in ullamcorper eros consectetur at. Integer commodo dolor nec purus pulvinar malesuada.
                       Praesent sed elementum purus. Nulla consequat sapien et nisi molestie, a tempor mi iaculis. Donec arcu purus, iaculis eget sem ut, tincidunt sodales magna. Phasellus ut augue finibus, ultricies magna et, consequat massa. Nam vehicula nisl nisl, quis vehicula ligula convallis vel. Aliquam vulputate ullamcorper sem at vulputate. Nunc sem mauris, rutrum a lorem non, rutrum accumsan nulla. Duis vestibulum malesuada rutrum. Integer eget sapien dictum, bibendum nulla a, tincidunt justo. Maecenas lobortis justo scelerisque, rutrum magna eu, venenatis nibh. Integer nunc nulla, blandit sed commodo sit amet, lacinia ac odio. Nulla risus sapien, lacinia id interdum id, maximus vitae nunc. Duis risus lacus, rhoncus id sagittis ut, cursus nec nunc.',
        )
    );


    private $arrayPlans = array(
		array(
            'user_id' => 1,
            'preu' => 5,
            'name' => 'Prova',
            'text' => 'En este plan mostrare las obras cuando cumplan un año',
        ),
        array(
            'user_id' => 1,
            'preu' => 8,
            'name' => 'Nose',
            'text' => 'Fumar mucho',
        )
    ); 

    private $arrayUsers = array(
		array(
            'id'=> 1,
            'username' => 'superadmin',
            'email' => 'vguitart6@gmail.com',
            'password' => '1234',
        ),
        array(
            'id' => 2,
            'username' => 'test',
            'email' => 'vguitart5@gmail.com',
            'password' => '1234',
        )
    );

    
}
