<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Categoria.php';
require_once __DIR__ . '/../includes/database.php';

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

        $this->dbMock->expects($this->once())
            ->method('query')
            ->willReturn($resultMock);

        $resultado = $this->categoria->cadastrarCategoria("Categoria Existente");

        $this->assertEquals('Categoria já cadastrada!&warning', $resultado);
    }

    public function testCadastrarCategoriaSucesso()
    {
        $resultMock1 = $this->createMock(mysqli_result::class);
        $resultMock1->method('fetch_assoc')->willReturn(['existe' => 0]);

        $resultMock2 = $this->createMock(mysqli_result::class);
        $resultMock2->method('fetch_assoc')->willReturn(['count' => 1]);

        $mysqli = $this->getMockBuilder(mysqli::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mysqli->expects($this->exactly(3))
            ->method('query')
            ->willReturnOnConsecutiveCalls($resultMock1, true, $resultMock2);

        $categoria = new Categoria(new Database('localhost', 'root', '', 'cadastrinhocadastroso', $mysqli));

        $resultado = $categoria->cadastrarCategoria("Nova Categoria");

        $this->assertEquals('Categoria cadastrada com sucesso!&success', $resultado);
    }
}
