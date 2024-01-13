<?php

abstract class BangunDatar
{
    public string $name;
    abstract function area(): float;
    abstract function circumference(): float;
    abstract function enlarge(int $scale): void;
    abstract function shrink(int $scale): void;
}


class Lingkaran extends BangunDatar
{
    private float $radius;

    public function __construct(float $radius)
    {
        $this->name = "Lingkaran";
        $this->radius = $radius;
    }

    public function area(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function circumference(): float
    {
        return 2 * pi() * $this->radius;
    }

    public function enlarge(int $scale): void
    {
        $this->radius = $this->radius * $scale;
    }

    public function shrink(int $scale): void
    {
        $this->radius = $this->radius / $scale;
    }
}

class Persegi extends BangunDatar
{
    private float $sisi;

    public function __construct(float $sisi)
    {
        $this->name = "Persegi";
        $this->sisi = $sisi;
    }

    public function area(): float
    {
        return pow($this->sisi, 2);
    }

    public function circumference(): float
    {
        return 4 * $this->sisi;
    }

    public function enlarge(int $scale): void
    {
        $this->sisi = $this->sisi * $scale;
    }

    public function shrink(int $scale): void
    {
        $this->sisi = $this->sisi / $scale;
    }
}

class PersegiPanjang extends BangunDatar
{
    private float $panjang;
    private float $lebar;

    public function __construct(float $panjang, float $lebar)
    {
        $this->name = "Persegi Panjang";
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    function area(): float
    {
        return $this->panjang * $this->lebar;
    }

    function circumference(): float
    {
        return 2 * ($this->panjang + $this->lebar);
    }

    function enlarge(int $scale): void
    {
        $this->panjang = $this->panjang * $scale;
        $this->lebar = $this->lebar * $scale;
    }

    function shrink(int $scale): void
    {
        $this->panjang = $this->panjang / $scale;
        $this->lebar = $this->lebar / $scale;
    }
}

class Descriptor
{
    public static function describe(BangunDatar $bangunDatar): void
    {
        printf(
            "Bangun datar ini adalah %s "
                . "yang memiliki luas %d "
                . "dan keliling %d\n",
            $bangunDatar->name,
            $bangunDatar->area(),
            $bangunDatar->circumference()
        );
    }
}


Descriptor::describe(new Lingkaran(5));
Descriptor::describe(new Persegi(90));
Descriptor::describe(new PersegiPanjang(23, 12));
