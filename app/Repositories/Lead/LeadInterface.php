<?php
/**
 * Created by PhpStorm.
 * User: Abhicenation
 * Date: 10/17/2017
 * Time: 12:33 PM
 */

namespace App\Repositories\Lead;

interface LeadInterface {

        public function getAll();

        public function save($data);
}