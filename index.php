<?php
/*
 * ZGZagua
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @author Victor Corbacho <victor@victorcorbacho.com>
 * @version 1.0.0 - 07/05/2011
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 */
 
// Includes
require_once( 'common/controller.php' );
require_once( 'common/database.php' );
require_once( 'incidents/incidents_controller.php' );
require_once( 'users/users_controller.php' );

session_start();

switch ( Controller::get( 'action' ) ) {
	case 'incidents_cron':
		// Obtiene los cortes de agua
		controller_incidents::load_xml();
		break;
	case 'incidents_notify':
		// Notifica los cortes de agua
		controller_incidents::notify();
	case 'login':
		controller_user::login();
		break;
	case 'suggest':
		controller_incidents::suggest();
		break;
	case 'estadisticas':
	case 'cortes':
	default:
		// Index
		Controller::show_html_header();
		Controller::show_html_body();
		Controller::show_html_footer();
		break;
}

?>