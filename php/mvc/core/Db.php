<?php
class Db{
    
    function newArray($fileName) {
        $items = [];
        $item = [];
        $f = fopen("database/$fileName.txt", "r") or die("error open file");
            $line1 = fgets($f);
            $keys = explode(' ', $line1);
            $leng = count($keys);
            $keys[$leng - 1] = trim($keys[$leng - 1]);
            while (!feof($f)) {
                $line = fgets($f);
                if($line == "") {
                    break;
                }
                $values = explode(' ', $line);
                for ($i = 0; $i < count($values); $i++) {
                    $item[$keys[$i]] = $values[$i];
                }
                array_push($items, $item);
            }
        fclose($f);
        return $items;
    }

    function newArray1($fileName) {
        $items = [];
        $item = [];
        $f = fopen($fileName, "r") or die("error open file");
            $line1 = fgets($f);
            $keys = explode(' ', $line1);
            $leng = count($keys);
            $keys[$leng - 1] = trim($keys[$leng - 1]);
            while (!feof($f)) {
                $line = fgets($f);
                if($line == "") {
                    break;
                }
                $values = explode(' ', $line);
                for ($i = 0; $i < count($values); $i++) {
                    $item[$keys[$i]] = $values[$i];
                }
                array_push($items, $item);
            }
        fclose($f);
        return $items;
    }

    function newObject($fileName) {
        $file = fopen($fileName, "r") or die('can not open file');
        $line = fread($file, filesize($fileName));
        fclose($file);
        $arr = explode("\n", $line);
        $oj = [];
        foreach($arr as $v) {
            $a = explode(" ", $v);
            $oj[$a[0]] = $a[1];
        };
        return $oj;
    }
    
    function filter($items, $key, $value) {
        $newItems = [];
        foreach($items as $item){
            if($item[$key] == $value) {
                array_push($newItems, $item);
            }
        }
        return $newItems;
    }

    function filter1($items, $key, $value) {
        $newItems = [];
        foreach($items as $item){
            if($item[$key[0]] == $value[0] && $item[$key[1]] == $value[1]) {
                array_push($newItems, $item);
            }
        }
        return $newItems;
    }
    
    function newFile($name) {
        $file = fopen("database/$name.txt", "w") or die("error open file");
        $txt = "name mark color manufacture price\n";
        fwrite($file, $txt);
        $txt = "z-1000 kawasaki black 2019 400\n";
        fwrite($file, $txt);
        $txt = "ducati bmw red 2023 110\n";
        fwrite($file, $txt);
        $txt = "gold-win honda white 1999 138";
        fwrite($file, $txt);
        fclose($file);
    }

    function newItem($fileName, $line) {
        $f = fopen($fileName, 'a') or die("error open file");
        fwrite($f, $line . "\n");
        fclose($f);
    }
    
    function update($fileName, $name, $line) {
    $items = [];
    $f = fopen($fileName, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    foreach($items as $key => $v) {
        $arr = explode(" ", $v);
        if($arr[0] == $name){
            $items[$key] = $line . "\n";
            break;
        };
    };
    
    $f = fopen($fileName, 'w') or die("error open file");
    foreach($items as $item) {
        fwrite($f, $item);
    }
    fclose($f);
    }

    function update1($fileName, $name, $user, $line) {
    $items = [];
    $f = fopen($fileName, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    foreach($items as $key => $v) {
        $arr = explode(" ", $v);
        if($arr[0] == $user && $arr[1] == $name){
            $items[$key] = $line . "\n";
            break;
        };
    };
    
    $f = fopen($fileName, 'w') or die("error open file");
    foreach($items as $item) {
        fwrite($f, $item);
    }
    fclose($f);
    }

    function update2($fileName, $name, $value) {
    $items = [];
    $f = fopen($fileName, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    foreach($items as $key => $v) {
        $arr = explode(" ", $v);
        if($arr[0] == $name){
            $arr[count($arr) - 1] = $value;
            $line = join(" ", $arr);
            $items[$key] = $line . "\n";
            break;
        };
    };
    
    $f = fopen($fileName, 'w') or die("error open file");
    foreach($items as $item) {
        fwrite($f, $item);
    }
    fclose($f);
    }

    function update3($fileName, $name, $value) {
    $items = [];
    $f = fopen($fileName, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    foreach($items as $key => $v) {
        $arr = explode(" ", $v);
        if($arr[0] == $name){
            $a = $arr[count($arr) - 1];
            $line = str_replace('$', ' ', $value) . ' ' . $a;
            $items[$key] = $line;
            break;
        };
    };
    
    $f = fopen($fileName, 'w') or die("error open file");
    foreach($items as $item) {
        fwrite($f, $item);
    }
    fclose($f);
    }

    function moveTo($rootFile, $toFile, $name) {
    $items = [];
    $f = fopen($rootFile, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    $line = '';
    foreach($items as $key => $v) {
        $arrLine = explode(" ", $v);
        if($arrLine[0] == $name){
            $line = $v;
            unset($items[$key]);
            break;
        }
    }
    $items = array_values($items);
    
    $f = fopen($rootFile, 'w') or die("error open file");
    foreach($items as $item){
        fwrite($f, $item);
    };
    fclose($f);
    
    $f = fopen($toFile, 'a') or die("error open file");
    fwrite($f, $line);
    fclose($f);
    return $line;
    }

    function moveTo1($rootFile, $toFile, $name) {
    $items = [];
    $f = fopen($rootFile, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    $arr = [];
    foreach($items as $key => $v) {
        $arrLine = explode(" ", $v);
        if($arrLine[0] == $name){
            array_push($arr, $v);
            unset($items[$key]);
        }
    }
    $items = array_values($items);
    
    $f = fopen($rootFile, 'w') or die("error open file");
    foreach($items as $item){
        fwrite($f, $item);
    };
    fclose($f);
    
    $f = fopen($toFile, 'a') or die("error open file");
    foreach($arr as $i) {
        fwrite($f, $i);
    };
    fclose($f);   
    }

    function moveTo2($rootFile, $toFile, $user, $name) {
    $items = [];
    $f = fopen($rootFile, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    $arr = [];
    foreach($items as $key => $v) {
        $arrLine = explode(" ", $v);
        if($arrLine[0] == $user && $arrLine[1] == $name){
            array_push($arr, $v);
            unset($items[$key]);
        }
    }
    $items = array_values($items);
    
    $f = fopen($rootFile, 'w') or die("error open file");
    foreach($items as $item){
        fwrite($f, $item);
    };
    fclose($f);
    
    $f = fopen($toFile, 'a') or die("error open file");
    foreach($arr as $i) {
        fwrite($f, $i);
    };
    fclose($f);   
    }
    
    function deleteOne($fileName, $name) {
    $items = [];
    $f = fopen($fileName, 'r') or die("error open file");
    while(!feof($f)) {
        array_push($items, fgets($f));
    }
    fclose($f);
    foreach($items as $key => $v) {
        $arrLine = explode(" ", $v);
        if($arrLine[0] == $name) {
            unset($items[$key]);
            break;
        }
    }
    $items = array_values($items);
    
    $f = fopen($fileName, 'w') or die("error open file");
    foreach($items as $item) {
        fwrite($f, $item);
    }
    fclose($f);
    }

    function deleteAll($fileName) {
    $line = '';
    $f = fopen($fileName, 'r') or die('error open file');
    $line = fgets($f);
    fclose($f);

    $f = fopen($fileName, 'w') or die('error open file');
    fwrite($f, $line);
    fclose($f);
    }
}
