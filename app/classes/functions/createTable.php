<?php

namespace App\classes\functions;

use DB;

/**
 * Users and Roles
 */
class createTable
{
    public static function createBasicTable($headers, $rows)
    {
        $html = '';
        $html .= '
    <table class="table table-hover">
     <thead>';
        foreach ($headers as $header) {
            $html .= '<th>'.$header.'</th>';
        }
        $html .= '
      </thead>
      <tbody>';
        foreach ($rows as $row) {
            $html .= '<tr>'.$row.'</tr>';
        }
        $html .= '
      </tbody>
    </table>';

        return $html;
    }

    public static function transformToRow($rows)
    {
        $html = '';
        foreach ($rows as $row) {
            if (is_array($row)) {
                $row = 'ARRAY';
            }
            $html .= '<td>'.$row.'</td>';
        }

        return $html;
    }
}
