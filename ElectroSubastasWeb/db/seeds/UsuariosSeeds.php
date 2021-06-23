<?php


use Phinx\Seed\AbstractSeed;

class UsuariosSeeds extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data[] = [
                'id' => '1',
                'usuario' => 'prueba@gmail.com',
                'password' => password_hash('123',PASSWORD_DEFAULT),
        ];

        $this->table('usuarios')->insert($data)->saveData();
    }
}
