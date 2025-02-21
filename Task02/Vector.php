<?php

declare(strict_types=1);

namespace MyApp\Models;

class Vector
{
    private float $x;
    private float $y;
    private float $z;

    public function __construct(float $x, float $y, float $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    public function add(Vector $v): Vector
    {
        return new Vector(
            $this->x + $v->x,
            $this->y + $v->y,
            $this->z + $v->z
        );
    }

    public function sub(Vector $v): Vector
    {
        return new Vector(
            $this->x - $v->x,
            $this->y - $v->y,
            $this->z - $v->z
        );
    }

    public function product(float $scalar): Vector
    {
        return new Vector(
            $this->x * $scalar,
            $this->y * $scalar,
            $this->z * $scalar
        );
    }

    public function scalarProduct(Vector $v): float
    {
        return ($this->x * $v->x)
            + ($this->y * $v->y)
            + ($this->z * $v->z);
    }

    public function vectorProduct(Vector $v): Vector
    {
        return new Vector(
            ($this->y * $v->z) - ($this->z * $v->y),
            ($this->z * $v->x) - ($this->x * $v->z),
            ($this->x * $v->y) - ($this->y * $v->x)
        );
    }

    public function __toString(): string
    {
        return sprintf('(%0.2f;%0.2f;%0.2f)', $this->x, $this->y, $this->z);
    }
}
