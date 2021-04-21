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
 * Send queued submissions to Turnitin.
 *
 * @package    plagiarism_turnitin
 * @author     John McGettrick http://www.turnitin.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace plagiarism_turnitin\task;

use plagiarism_plugin_turnitin;

defined('MOODLE_INTERNAL') || die();

/**
 * Send queued submissions to Turnitin.
 */
class send_submissions extends \core\task\scheduled_task {

    public function get_name() {
        return get_string('sendqueuedsubmissions', 'plagiarism_turnitin');
    }

    public function execute() {
        $plagiarismturnitin = new plagiarism_plugin_turnitin();
        if ($plagiarismturnitin->is_plugin_configured()) {
            return;
        }
        plagiarism_turnitin_send_queued_submissions();
    }
}