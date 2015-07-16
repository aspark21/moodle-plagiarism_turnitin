<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   plagiarism_turnitin
 * @copyright 2012 iParadigms LLC *
 */

// TODO: Split out all module specific code from plagiarism/turnitin/lib.php
class turnitin_forum {

	private $modname;
	public $grades_table;

	public function __construct() {
		$this->modname = 'forum';
		$this->grades_table = '';
	}

	public function is_tutor($context) {
		return has_capability($this->get_tutor_capability(), $context);
	}

	public function get_tutor_capability() {
		return 'plagiarism/turnitin:viewfullreport';
	}

	public function user_enrolled_on_course($context, $userid) {
		return has_capability('mod/'.$this->modname.':replypost', $context, $userid);
	}

	public function get_author($itemid) {
		return ;
	}

	public function set_content($linkarray, $moduleid) {
		return $linkarray["content"];
    }

    public function create_file_event($params) {
		return \mod_forum\event\assessable_uploaded::create($params);
	}
}