<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

// -----------------------------------------------------------------------------
// Get Language by ID
function get_lang_name_by_id($id) {
	$ci = &get_instance();
	$ci->db->where('id', $id);
	return $ci->db->get('fx_language')->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get Language Short Code
function get_lang_short_code($id) {
	$ci = &get_instance();
	$ci->db->where('id', $id);
	return $ci->db->get('fx_language')->row_array()['short_name'];
}

// -----------------------------------------------------------------------------
// Get Language List
function get_language_list() {
	$ci = &get_instance();
	$ci->db->where('status', 1);
	return $ci->db->get('fx_language')->result_array();
}

// -----------------------------------------------------------------------------
// Get country list
function get_country_list() {
	$ci = &get_instance();
	return $ci->db->get('fx_countries')->result_array();
}

// -----------------------------------------------------------------------------
// Get country name by ID
function get_country_name($id) {
	$ci = &get_instance();
	return $ci->db->get_where('fx_countries', array('id' => $id))->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get City ID by Name
function get_country_id($title) {
	$ci = &get_instance();
	return $ci->db->get_where('fx_countries', array('slug' => $title))->row_array()['id'];
}

// -----------------------------------------------------------------------------
// Get country slug
function get_country_slug($id) {
	$ci = &get_instance();
	return $ci->db->get_where('fx_countries', array('id' => $id))->row_array()['slug'];
}

// -----------------------------------------------------------------------------
// Get country's states
function get_country_states($country_id) {
	$ci = &get_instance();
	return $ci->db->select('*')->where('country_id', $country_id)->get('fx_states')->result_array();
}

// -----------------------------------------------------------------------------
// Get state's cities
function get_state_cities($state_id) {
	$ci = &get_instance();
	return $ci->db->select('*')->where('state_id', $state_id)->get('fx_cities')->result_array();
}

// Get state name by ID
function get_state_name($id) {
	$ci = &get_instance();
	return $ci->db->get_where('fx_states', array('id' => $id))->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get city name by ID
function get_city_name($id) {
	$ci = &get_instance();
	return $ci->db->get_where('fx_cities', array('id' => $id))->row_array()['name'];
}

// -----------------------------------------------------------------------------
// Get city ID by title
function get_city_slug($id) {
	$ci = &get_instance();
	return $ci->db->get_where('fx_cities', array('id' => $id))->row_array()['slug'];
}

/**
 * Generic function which returns the translation of input label in currently loaded language of user
 * @param $string
 * @return mixed
 */
if (!function_exists('trans')) {
	function trans($word) {
		$CI = &get_instance();
		$CI->load->database();

		$return = '';

		return ucwords(str_replace('_', ' ', $word));
	}
}
function remove_accents($string) {

	if (!preg_match('/[\x80-\xff]/', $string)) {
		return $string;
	}

	if (seems_utf8($string)) {

		$chars = array(

			// Decompositions for Latin-1 Supplement

			chr(195) . chr(128) => 'A', chr(195) . chr(129) => 'A',

			chr(195) . chr(130) => 'A', chr(195) . chr(131) => 'A',

			chr(195) . chr(132) => 'A', chr(195) . chr(133) => 'A',

			chr(195) . chr(135) => 'C', chr(195) . chr(136) => 'E',

			chr(195) . chr(137) => 'E', chr(195) . chr(138) => 'E',

			chr(195) . chr(139) => 'E', chr(195) . chr(140) => 'I',

			chr(195) . chr(141) => 'I', chr(195) . chr(142) => 'I',

			chr(195) . chr(143) => 'I', chr(195) . chr(145) => 'N',

			chr(195) . chr(146) => 'O', chr(195) . chr(147) => 'O',

			chr(195) . chr(148) => 'O', chr(195) . chr(149) => 'O',

			chr(195) . chr(150) => 'O', chr(195) . chr(153) => 'U',

			chr(195) . chr(154) => 'U', chr(195) . chr(155) => 'U',

			chr(195) . chr(156) => 'U', chr(195) . chr(157) => 'Y',

			chr(195) . chr(159) => 's', chr(195) . chr(160) => 'a',

			chr(195) . chr(161) => 'a', chr(195) . chr(162) => 'a',

			chr(195) . chr(163) => 'a', chr(195) . chr(164) => 'a',

			chr(195) . chr(165) => 'a', chr(195) . chr(167) => 'c',

			chr(195) . chr(168) => 'e', chr(195) . chr(169) => 'e',

			chr(195) . chr(170) => 'e', chr(195) . chr(171) => 'e',

			chr(195) . chr(172) => 'i', chr(195) . chr(173) => 'i',

			chr(195) . chr(174) => 'i', chr(195) . chr(175) => 'i',

			chr(195) . chr(177) => 'n', chr(195) . chr(178) => 'o',

			chr(195) . chr(179) => 'o', chr(195) . chr(180) => 'o',

			chr(195) . chr(181) => 'o', chr(195) . chr(182) => 'o',

			chr(195) . chr(182) => 'o', chr(195) . chr(185) => 'u',

			chr(195) . chr(186) => 'u', chr(195) . chr(187) => 'u',

			chr(195) . chr(188) => 'u', chr(195) . chr(189) => 'y',

			chr(195) . chr(191) => 'y',

			// Decompositions for Latin Extended-A

			chr(196) . chr(128) => 'A', chr(196) . chr(129) => 'a',

			chr(196) . chr(130) => 'A', chr(196) . chr(131) => 'a',

			chr(196) . chr(132) => 'A', chr(196) . chr(133) => 'a',

			chr(196) . chr(134) => 'C', chr(196) . chr(135) => 'c',

			chr(196) . chr(136) => 'C', chr(196) . chr(137) => 'c',

			chr(196) . chr(138) => 'C', chr(196) . chr(139) => 'c',

			chr(196) . chr(140) => 'C', chr(196) . chr(141) => 'c',

			chr(196) . chr(142) => 'D', chr(196) . chr(143) => 'd',

			chr(196) . chr(144) => 'D', chr(196) . chr(145) => 'd',

			chr(196) . chr(146) => 'E', chr(196) . chr(147) => 'e',

			chr(196) . chr(148) => 'E', chr(196) . chr(149) => 'e',

			chr(196) . chr(150) => 'E', chr(196) . chr(151) => 'e',

			chr(196) . chr(152) => 'E', chr(196) . chr(153) => 'e',

			chr(196) . chr(154) => 'E', chr(196) . chr(155) => 'e',

			chr(196) . chr(156) => 'G', chr(196) . chr(157) => 'g',

			chr(196) . chr(158) => 'G', chr(196) . chr(159) => 'g',

			chr(196) . chr(160) => 'G', chr(196) . chr(161) => 'g',

			chr(196) . chr(162) => 'G', chr(196) . chr(163) => 'g',

			chr(196) . chr(164) => 'H', chr(196) . chr(165) => 'h',

			chr(196) . chr(166) => 'H', chr(196) . chr(167) => 'h',

			chr(196) . chr(168) => 'I', chr(196) . chr(169) => 'i',

			chr(196) . chr(170) => 'I', chr(196) . chr(171) => 'i',

			chr(196) . chr(172) => 'I', chr(196) . chr(173) => 'i',

			chr(196) . chr(174) => 'I', chr(196) . chr(175) => 'i',

			chr(196) . chr(176) => 'I', chr(196) . chr(177) => 'i',

			chr(196) . chr(178) => 'IJ', chr(196) . chr(179) => 'ij',

			chr(196) . chr(180) => 'J', chr(196) . chr(181) => 'j',

			chr(196) . chr(182) => 'K', chr(196) . chr(183) => 'k',

			chr(196) . chr(184) => 'k', chr(196) . chr(185) => 'L',

			chr(196) . chr(186) => 'l', chr(196) . chr(187) => 'L',

			chr(196) . chr(188) => 'l', chr(196) . chr(189) => 'L',

			chr(196) . chr(190) => 'l', chr(196) . chr(191) => 'L',

			chr(197) . chr(128) => 'l', chr(197) . chr(129) => 'L',

			chr(197) . chr(130) => 'l', chr(197) . chr(131) => 'N',

			chr(197) . chr(132) => 'n', chr(197) . chr(133) => 'N',

			chr(197) . chr(134) => 'n', chr(197) . chr(135) => 'N',

			chr(197) . chr(136) => 'n', chr(197) . chr(137) => 'N',

			chr(197) . chr(138) => 'n', chr(197) . chr(139) => 'N',

			chr(197) . chr(140) => 'O', chr(197) . chr(141) => 'o',

			chr(197) . chr(142) => 'O', chr(197) . chr(143) => 'o',

			chr(197) . chr(144) => 'O', chr(197) . chr(145) => 'o',

			chr(197) . chr(146) => 'OE', chr(197) . chr(147) => 'oe',

			chr(197) . chr(148) => 'R', chr(197) . chr(149) => 'r',

			chr(197) . chr(150) => 'R', chr(197) . chr(151) => 'r',

			chr(197) . chr(152) => 'R', chr(197) . chr(153) => 'r',

			chr(197) . chr(154) => 'S', chr(197) . chr(155) => 's',

			chr(197) . chr(156) => 'S', chr(197) . chr(157) => 's',

			chr(197) . chr(158) => 'S', chr(197) . chr(159) => 's',

			chr(197) . chr(160) => 'S', chr(197) . chr(161) => 's',

			chr(197) . chr(162) => 'T', chr(197) . chr(163) => 't',

			chr(197) . chr(164) => 'T', chr(197) . chr(165) => 't',

			chr(197) . chr(166) => 'T', chr(197) . chr(167) => 't',

			chr(197) . chr(168) => 'U', chr(197) . chr(169) => 'u',

			chr(197) . chr(170) => 'U', chr(197) . chr(171) => 'u',

			chr(197) . chr(172) => 'U', chr(197) . chr(173) => 'u',

			chr(197) . chr(174) => 'U', chr(197) . chr(175) => 'u',

			chr(197) . chr(176) => 'U', chr(197) . chr(177) => 'u',

			chr(197) . chr(178) => 'U', chr(197) . chr(179) => 'u',

			chr(197) . chr(180) => 'W', chr(197) . chr(181) => 'w',

			chr(197) . chr(182) => 'Y', chr(197) . chr(183) => 'y',

			chr(197) . chr(184) => 'Y', chr(197) . chr(185) => 'Z',

			chr(197) . chr(186) => 'z', chr(197) . chr(187) => 'Z',

			chr(197) . chr(188) => 'z', chr(197) . chr(189) => 'Z',

			chr(197) . chr(190) => 'z', chr(197) . chr(191) => 's',

			// Euro Sign

			chr(226) . chr(130) . chr(172) => 'E',

			// GBP (Pound) Sign

			chr(194) . chr(163) => '');

		$string = strtr($string, $chars);

	} else {

		// Assume ISO-8859-1 if not UTF-8

		$chars['in'] = chr(128) . chr(131) . chr(138) . chr(142) . chr(154) . chr(158)

		. chr(159) . chr(162) . chr(165) . chr(181) . chr(192) . chr(193) . chr(194)

		. chr(195) . chr(196) . chr(197) . chr(199) . chr(200) . chr(201) . chr(202)

		. chr(203) . chr(204) . chr(205) . chr(206) . chr(207) . chr(209) . chr(210)

		. chr(211) . chr(212) . chr(213) . chr(214) . chr(216) . chr(217) . chr(218)

		. chr(219) . chr(220) . chr(221) . chr(224) . chr(225) . chr(226) . chr(227)

		. chr(228) . chr(229) . chr(231) . chr(232) . chr(233) . chr(234) . chr(235)

		. chr(236) . chr(237) . chr(238) . chr(239) . chr(241) . chr(242) . chr(243)

		. chr(244) . chr(245) . chr(246) . chr(248) . chr(249) . chr(250) . chr(251)

		. chr(252) . chr(253) . chr(255);

		$chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";

		$string = strtr($string, $chars['in'], $chars['out']);

		$double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));

		$double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');

		$string = str_replace($double_chars['in'], $double_chars['out'], $string);

	}

	return $string;

}
function seems_utf8($str) {

	$length = strlen($str);

	for ($i = 0; $i < $length; $i++) {

		$c = ord($str[$i]);

		if ($c < 0x80) {
			$n = 0;
		}
		# 0bbbbbbb

		elseif (($c & 0xE0) == 0xC0) {
			$n = 1;
		}
		# 110bbbbb

		elseif (($c & 0xF0) == 0xE0) {
			$n = 2;
		}
		# 1110bbbb

		elseif (($c & 0xF8) == 0xF0) {
			$n = 3;
		}
		# 11110bbb

		elseif (($c & 0xFC) == 0xF8) {
			$n = 4;
		}
		# 111110bb

		elseif (($c & 0xFE) == 0xFC) {
			$n = 5;
		}
		# 1111110b

		else {
			return false;
		}
		# Does not match any model

		for ($j = 0; $j < $n; $j++) {
			# n bytes matching 10bbbbbb follow ?

			if ((++$i == $length) || ((ord($str[$i]) & 0xC0) != 0x80)) {
				return false;
			}

		}

	}

	return true;

}
function utf8_uri_encode($utf8_string, $length = 0) {

	$unicode = '';

	$values = array();

	$num_octets = 1;

	$unicode_length = 0;

	$string_length = strlen($utf8_string);

	for ($i = 0; $i < $string_length; $i++) {

		$value = ord($utf8_string[$i]);

		if ($value < 128) {

			if ($length && ($unicode_length >= $length)) {
				break;
			}

			$unicode .= chr($value);

			$unicode_length++;

		} else {

			if (count($values) == 0) {
				$num_octets = ($value < 224) ? 2 : 3;
			}

			$values[] = $value;

			if ($length && ($unicode_length + ($num_octets * 3)) > $length) {
				break;
			}

			if (count($values) == $num_octets) {

				if ($num_octets == 3) {

					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);

					$unicode_length += 9;

				} else {

					$unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);

					$unicode_length += 6;

				}

				$values = array();

				$num_octets = 1;

			}

		}

	}

	return $unicode;

}
function makeSeoUri($courseTitle) {

	$data = array();

	$CI = get_instance();

	/*$title = $subjectData['subjectTitle'].' '.$courseTitle;*/

	$title = $courseTitle;

	/*$courseTitle = strtolower(str_replace(" ", "-", $title));*/

	$title = strip_tags($title);

	// Preserve escaped octets.

	$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);

	// Remove percent signs that are not part of an octet.

	$title = str_replace('%', '', $title);

	// Restore octets.

	$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

	$title = remove_accents($title);

	if (seems_utf8($title)) {

		if (function_exists('mb_strtolower')) {

			$title = mb_strtolower($title, 'UTF-8');

		}

		$title = utf8_uri_encode($title, 200);

	}

	$title = strtolower($title);

	$title = preg_replace('/&.+?;/', '', $title); // kill entities

	$title = str_replace('.', '-', $title);

	$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);

	$title = preg_replace('/\s+/', '-', $title);

	$title = preg_replace('|-+|', '-', $title);

	$title = trim($title, '-');

	//echo $title;die();

	$seoUri = $title;

	return $seoUri;

}
function makeVolunteertabing() {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$voluntterData = $CI->Common_model->getRecords('fx_volunteer', array('status' => 0));

	if (Count($voluntterData) > 0) {
		$cnt = 0;
		foreach ($voluntterData as $key => $value) {
			$htmlContent .= '<li>
                           <div class="image-vContent col-100 floatLft ">
                              <div class="image-vContentImg  relative">
                                 <img src="' . base_url() . 'uploads/volunteer/' . $value['volThumbImage'] . '" alt="">
                                 <div class="ap__socialDiv np__socialDiv col-100 floatLft absolute">
                                    <a href="' . $value['volunteerFbLink'] . '" target="blank"><i class="fa fa-facebook-f"></i></a>
                                    <a href="' . $value['volunteerInstaLink'] . '" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i>
                                    </a>
                                 </div>
                              </div>
                              <div class="image-popupDisc col-100 floatLft textCenter">
                                 <h2 class="vTitle">' . $value['volunteerName'] . '</h2>
                                 <p>' . $value['volunteerDesignation'] . '</p>
                              </div>
                           </div>
                        </li>';
			$cnt++;
		}
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;

	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No volunteer Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	return $htmlContent;
}

function goalsHomeSlider() {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$goalData = $CI->Common_model->getRecords('fx_goals', array('status' => 0), '', array('goalsNumber' => 'ASC'));

	if (Count($goalData) > 0) {
		$cnt = 0;
		foreach ($goalData as $key => $value) {
			$htmlContent .= '  <li>
            <div class="ap__goalWrp col-100 floatLft">
               <img src="' . base_url() . 'uploads/goals/' . $value['goalsThumbImage'] . '" alt="">
               <div class="ap__goalContents absolute animated animatedFadeInUp fadeInUp">
                  <a href="' . base_url('sustainable-goals') . '">
                     <h2 class="ap__goalTitle">Read More</h2>
                  </a>
               </div>
            </div>
         </li>';
			$cnt++;
		}
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;

	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No Goal Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	return $htmlContent;
}

function TeamHomePageSlider() {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$teamData = $CI->Common_model->getRecords('fx_team', array('status' => 0));

	if (Count($teamData) > 0) {
		$cnt = 0;
		foreach ($teamData as $key => $value) {
			$htmlContent .= '<li class="ap__teamCardWrp">
            <div class="ap__teamCard col-100 floatLft textCenter">
               <div class="ap__teamImage"><img src="' . base_url() . 'uploads/team/' . $value['teamThumbImage'] . '" alt=""></div>
               <div class="ap__teamName">' . $value['teamName'] . '</div>
               <span class="ap__teamPosition">' . $value['teamDesignation'] . '</span>
            </div>
         </li>';
			$cnt++;
		}
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;

	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No Goal Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	return $htmlContent;
}

function CampaignHomePageSlider() {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$campaignData = $CI->Common_model->getRecords('fx_campaign', array('status' => 0));

	if (Count($campaignData) > 0) {
		$cnt = 0;
		foreach ($campaignData as $key => $value) {
			$htmlContent .= '<li>
            <div class="ap__campaignWrp ap__camp__1 col-100 floatLft flexDisplay flexColumn textLeft">
               <div class="ap__innerSpace col-100 floatLft"></div>
               <div class="ap__campaignData floatLft">
                  <h2 class="ap__campaignHead ap__common__heading">' . $value['campaignName'] . '</h2>
                  <p class="ap__common__para">' . strip_tags($value['campaignshortDesc']) . '</p>
                  <a href="' . base_url() . 'campaign/' . $value['seoUri'] . '" class="ap__takeAction">TAKE ACTION<span><img src="<?php echo base_url(); ?> /uploads/campaign/' . $value['campaignThumbImage'] . '" alt=""></span></a>
               </div>
            </div>
         </li>';
			$cnt++;
		}
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;

	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No Goal Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	return $htmlContent;
}

function galleryPageTabing($galleryID) {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$multiImagesData = $CI->Common_model->getRecords('fx_gallery_images', array('galleryID' => $galleryID));

	if (Count($multiImagesData) > 0) {
		$cnt = 0;
		$htmlContent .= '<ul class="np-gallary__tabContant--list  col-100 floatLft">';
		foreach ($multiImagesData as $key => $value) {
			$htmlContent .= '<li>
                     <div class="image-popupContent">
                        <a class="image-popup" href="' . base_url() . 'uploads/gallery/' . $value['galleryImage'] . '">
                        <img src="' . base_url() . 'uploads/gallery/' . $value['galleryImage'] . '" alt="">
                        </a>
                     </div>
                  </li>';
			$cnt++;
		}
		$htmlContent .= '</ul>';
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;

	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No Images Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	// echo $htmlContent;die();
	return $htmlContent;
}

function goalPagelisting() {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$goalsData = $CI->Common_model->getRecords('fx_goals', array('status' => 0), '', array('goalsNumber' => 'ASC'));

	if (Count($goalsData) > 0) {
		$cnt = 0;
		foreach ($goalsData as $key => $value) {
			$htmlContent .= '<li>
            <div class="ap__goalWrp col-100 floatLft">
               <img src="' . base_url() . 'uploads/goals/' . $value['goalsdetailImage'] . '" alt="">
               <div class="ap__goalContents absolute animated animatedFadeInUp fadeInUp">
                  <a href="#np-goalText' . $value['goalsNumber'] . '" class="np-goalPop" data-effect="mfp-zoom-in" data-effect="mfp-zoom-in">
                     <h2 class="ap__goalTitle" >
                     <h2 class="ap__goalTitle">Goal ' . $value['goalsNumber'] . ': ' . $value['goalsName'] . '</h2>
                  </a>
                  <p class="ap__common__para np__common__para mfp-with-anim mfp-hide" id="np-goalText' . $value['goalsNumber'] . '">
                     <span class="Goal-1">Goal ' . $value['goalsNumber'] . ': ' . $value['goalsName'] . '</span>
                    		' . strip_tags($value['goalsShortDesc']) . '
                  </p>
               </div>
            </div>
         </li>';
			$cnt++;
		}
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;
	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No Images Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	return $htmlContent;
}

function eventPagelisting() {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$eventData = $CI->Common_model->getRecords('fx_event', array('status' => 0));

	if (Count($eventData) > 0) {
		$cnt = 0;
		foreach ($eventData as $key => $value) {
			$htmlContent .= '<li>
            <div class="ap__campaignWrp ap__camp__1 col-100 floatLft flexDisplay flexColumn textLeft">
               <div class="ap__innerSpace col-100 floatLft"></div>
               <div class="ap__campaignData floatLft">
                  <h2 class="ap__campaignHead ap__common__heading">' . $value['eventName'] . '</h2>
                  <p class="ap__common__para">' . strip_tags($value['eventshortDesc']) . '.</p>
                  <a href="' . base_url() . 'event/' . $value['seoUri'] . '" class="ap__takeAction">TAKE ACTION <span><img src="<?php echo base_url(); ?> /uploads/event/' . $value['eventThumbImage'] . '" alt=""></span></a>
               </div>
            </div>
         </li>';
			$cnt++;
		}
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;
	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No Images Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	return $htmlContent;
}

function campaignPagelisting() {
	$htmlContent = '';
	$data = array();
	$CI = get_instance();
	$CI->load->model('Common_model');
	$campaignData = $CI->Common_model->getRecords('fx_campaign', array('status' => 0));

	if (Count($campaignData) > 0) {
		$cnt = 0;
		foreach ($campaignData as $key => $value) {
			$htmlContent .= '<li>
            <div class="ap__campaignWrp ap__camp__1 col-100 floatLft flexDisplay flexColumn textLeft">
               <div class="ap__innerSpace col-100 floatLft"></div>
               <div class="ap__campaignData floatLft">
                  <h2 class="ap__campaignHead ap__common__heading">' . $value['campaignName'] . '</h2>
                  <p class="ap__common__para">' . strip_tags($value['campaignshortDesc']) . '.</p>
                  <a href="' . base_url() . 'campaign/' . $value['seoUri'] . '" class="ap__takeAction">TAKE ACTION <span><img src="<?php echo base_url(); ?> /uploads/campaign/' . $value['campaignThumbImage'] . '" alt=""></span></a>
               </div>
            </div>
         </li>';
			$cnt++;
		}
		$status = 'success';
		$data['content'] = $htmlContent;
		$data['count'] = $cnt;
	} else {
		$status = 'error';
		$htmlContent = '<li class="messageList">No Images Available</li>';
	}
	$data['status'] = $status;
	$data['content'] = $htmlContent;
	return $htmlContent;
}