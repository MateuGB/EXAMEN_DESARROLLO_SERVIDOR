<?php
class Producto
{
    private int $id;
    private string $nombre;
    private string $categoria;
    private float $precio;
    private int $stock;

    public function __construct(int $id, string $nombre, string $categoria, float $precio, int $stock)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->categoria = $categoria;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function valorTotal(): float
    {
        return $this->precio * $this->stock;
    }

    public function estado(): string
    {
        if ($this->stock == 0) {
            return "Agotado";
        } elseif ($this->stock <= 3) {
            return "Stock bajo";
        } else {
            return "Disponible";
        }
    }
}

?>