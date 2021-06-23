<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Second extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->execute("
        CREATE TABLE usuarios (
            id int NOT NULL,
            usuario varchar(100) NOT NULL,
            password varchar(100) NOT NULL,
            constraint usuario_pk
                primary key (id)
        );
    ");
    }
    public function down()
    {
        $this->execute("
        DROP TABLE usuarios
        ");
    }
}
