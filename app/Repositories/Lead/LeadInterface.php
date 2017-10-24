<?php
/**
 * Created by PhpStorm.
 * User: Abhicenation
 * Date: 10/17/2017
 * Time: 12:33 PM
 */

namespace App\Repositories\Lead;

interface LeadInterface {

        public function getAll($where);

        public function save($data);

        public function updateStatus($id,$status);

        public function getById($id);

        public function update($id,$data);

        public function setfollowup($data);

        public function updateFollowupStatus($id,$status);
}