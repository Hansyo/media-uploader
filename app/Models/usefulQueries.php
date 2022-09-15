<?php

namespace App\Models;

use Carbon\Carbon;

trait usefulQueries
{
    /**
     * 指定された日付の範囲のデータを取得する
     */
    static public function getBetweenCreated($from, $to)
    {
        // FromよりToが日付的に後ろなら、入れ替える。
        if((new Carbon($from)) > (new Carbon($to))) {
            [$from, $to] = [$to, $from];
        }
        $items = self::whereBetween('created_at', [$from, $to])->get();
        return $items;
    }
}
