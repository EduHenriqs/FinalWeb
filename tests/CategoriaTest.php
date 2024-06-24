<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Categoria.php';
if (!class_exists('Database')) {
   require_once __DIR__ . '/../includes/database.php';
}


class CategoriaTest extends TestCase
{
    private $dbMock;
    private $categoria;

    protected function setUp(): void
    {
        $this->dbMock = $this->createMock(Database::class);
        $this->categoria = new Categoria($this->dbMock);
    }

    public function testCadastrarCategoriaJaExistente()
    {
        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->method('fetch_assoc')->willReturn(['existe' => 1]);

        $stmtMock = $this->createMock(mysqli_stmt::class);
        $stmtMock->method('execute')->willReturn(true);
        $stmtMock->method('get_result')->willReturn($resultMock);

        $this->dbMock->expects($this->once())
            ->method('prepare')
            ->willReturn($stmtMock);

        $resultado = $this->categoria->cadastrarCategoria("Categoria Existente");

        $this->assertEquals('Categoria já cadastrada!&warning', $resultado);
    }

    public function testCadastrarCategoriaSucesso()
    {
        $resultMock1 = $this->createMock(mysqli_result::class);
        $resultMock1->method('fetch_assoc')->willReturn(['existe' => 0]);

        $resultMock2 = $this->createMock(mysqli_result::class);
        $resultMock2->method('fetch_assoc')->willReturn(['count' => 1]);

        $stmtMock1 = $this->createMock(mysqli_stmt::class);
        $stmtMock1->method('execute')->willReturn(true);
        $stmtMock1->method('get_result')->willReturn($resultMock1);

        $stmtMock2 = $this->createMock(mysqli_stmt::class);
        $stmtMock2->method('execute')->willReturn(true);

        $stmtMock3 = $this->createMock(mysqli_stmt::class);
        $stmtMock3->method('execute')->willReturn(true);
        $stmtMock3->method('get_result')->willReturn($resultMock2);

        $this->dbMock->expects($this->exactly(3))
            ->method('prepare')
            ->willReturnOnConsecutiveCalls($stmtMock1, $stmtMock2, $stmtMock3);

        $resultado = $this->categoria->cadastrarCategoria("Nova Categoria");

        $this->assertEquals('Categoria cadastrada com sucesso!&success', $resultado);
    }
}
