<?php

class Sort {

    public static function generateArray($number)
    {
        $data = [];
        srand(1);
        for($i = 1; $i <= $number; $i++){
            $data[$i] = rand(1, 100);
        }
        return $data;
    }

    // bubble sort classic
    public static function bubbleSort1(&$data)
    {
        $start = self::getTime();
        do {
            $swap = false;
            for($i = 1; $i < count($data); $i++){
                if ($data[$i] < $data[$i + 1]){
                    self::swap($data, $i);
                    $swap = true;
                }
            }
        } while($swap === true);
        $end = self::getTime($start);
        echo "bubble sort 1 : " . round($end, 6) . PHP_EOL;
    }

    // bubble sort optimized with last swap
    public static function bubbleSort2(&$data)
    {
        $start = self::getTime();
        $lastSwap = count($data);
        $currentSwap = 0;
        do {
            $swap = false;
            for($i = 1; $i < $lastSwap; $i++){
                if ($data[$i] < $data[$i + 1]){
                    self::swap($data, $i);
                    $swap = true;
                    $currentSwap = $i;
                }
            }
            $lastSwap = $currentSwap;
        } while($swap === true);
        $end = self::getTime($start);
        echo "bubble sort 2 : " . round($end, 6) . PHP_EOL;
    }

    // bubble sort bi-directional
    public static function bubbleSort3(&$data)
    {
        $start = self::getTime();
        $size = count($data);
        do {
            $swap = false;
            for($i = 1; $i < $size; $i++){
                if ($data[$i] < $data[$i + 1]){
                    self::swap($data, $i);
                    $swap = true;
                }
            }
            for($i = $size - 1; $i > 0; $i--){
                if ($data[$i] < $data[$i + 1]){
                    self::swap($data, $i);
                    $swap = true;
                }
            }
        } while($swap === true);
        $end = self::getTime($start);
        echo "bubble sort 3 : " . round($end, 6) . PHP_EOL;
    }

    // odd even sort
    public static function oddEvenSort(&$data)
    {
        $start = self::getTime();
        $size = count($data);
        do {
            $swap = false;
            for ($i = 1; $i < $size; $i += 2){
                if ($data[$i] < $data[$i + 1]){
                    self::swap($data, $i);
                    $swap = true;
                }
            }
            for ($i = 2; $i < $size; $i += 2){
                if ($data[$i] < $data[$i + 1]){
                    self::swap($data, $i);
                    $swap = true;
                }
            }
        } while ($swap === true);
        $end = self::getTime($start);
        echo "odd even sort : " . round($end, 6) . PHP_EOL;
    }

    // comb sort
    public static function combSort(&$data)
    {
        $start = self::getTime();
        $interval = count($data);
        do {
            $swap = false;
            $interval = (int)($interval / 1.3);
            if ($interval < 1){
                $interval = 1;
            }
            for($i = 1; $i < count($data) - $interval; $i++){
                if ($data[$i] < $data[$i + $interval]){
                    self::swap($data, $i);
                    self::swap($data, $i + $interval);
                    $swap = true;
                }
            }
        } while($interval > 1 || $swap === true);
        $end = self::getTime($start);
        echo "comb sort : " . round($end, 6) . PHP_EOL;
    }


    private static function swap(&$data, $i)
    {
        $temp = $data[$i];
        $data[$i] = $data[$i + 1];
        $data[$i + 1] = $temp;
    }

    private static function getTime($microTime = null){
        $currentTime = microtime(true);
        if (!is_null($microTime)){
            $currentTime = $currentTime - $microTime;
        }
        return $currentTime;
    }

    public static function displayArray($data)
    {
        $total = count($data);
        foreach($data as $key => $number) {
            echo $number;
            if ($key != $total) {
                echo ", ";
            }
        }
        echo PHP_EOL;
    }
}


