<?php
/*
Plugin Name: cSlider
Description: Add content Slider to posts and pages.
Version: 2.4.2
Author: Julian Weinert // cs&m
Author URI: http://www.csundm.de
*/

/*
cSlider (Wordpress Plugin)
Copyright (C) 2009 Julian Weinert // cs&m
Contact us at http://www.csundm.de

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

This plugin is integrated with bxSlider <http://www.bxslider.com> and jQuery.
bxSlider is licenced under the terms of the MIT Licence. See <http://www.opensource.org/licenses/mit-license.php>.
*/
    
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////  Hover image core function ///////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function cSlider($atts, $content)
{
    $width = get_option("width");
    $mode = get_option("mode");
    $speed = get_option("speed");
    $infiniteLoop = get_option("infiniteLoop");
    $controls = get_option("controls");
    $startingSlide = get_option("startingSlide");
    $randomStart = get_option("randomStart");
    $hideControlOnEnd = get_option("hideControlOnEnd");
    $auto = get_option("auto");
    $pause = get_option("pause");
    $autoDirection = get_option("autoDirection");
    $autoHover = get_option("autoHover");
    $pager = get_option("pager");
    $pagerLocation = get_option("pagerLocation");
    $ticker = get_option("ticker");
    $tickerSpeed = get_option("tickerSpeed");
    $tickerDirection = get_option("tickerDirection");
    $tickerHover = get_option("tickerHover");
    $easing = get_option("easing");
    
    if($atts["width"])
    {
        $width = $atts["width"];
    }
    if($atts["mode"])
    {
        $mode = $atts["mode"];
    }
    if($atts["speed"])
    {
        $speed = $atts["speed"];
    }
    if($atts["infiniteLoop"])
    {
        $infiniteLoop = $atts["infiniteLoop"];
    }
    if($atts["controls"])
    {
        $controls = $atts["controls"];
    }
    if($atts["startingSlide"])
    {
        $startingSlide = $atts["startingSlide"];
    }
    if($atts["randomStart"])
    {
        $randomStart = $atts["randomStart"];
    }
    if($atts["hideControlOnEnd"])
    {
        $hideControlOnEnd = $atts["hideControlOnEnd"];
    }
    if($atts["auto"])
    {
        $auto = $atts["auto"];
    }
    if($atts["pause"])
    {
        $pause = $atts["pause"];
    }
    if($atts["autoDirection"])
    {
        $autoDirection = $atts["autoDirection"];
    }
    if($atts["autoHover"])
    {
        $autoHover = $atts["autoHover"];
    }
    if($atts["pager"])
    {
        $pager = $atts["pager"];
    }
    if($atts["pagerLocation"])
    {
        $pagerLocation = $atts["pagerLocation"];
    }
    if($atts["ticker"])
    {
        $ticker = $atts["ticker"];
    }
    if($atts["tickerSpeed"])
    {
        $tickerSpeed = $atts["tickerSpeed"];
    }
    if($atts["tickerDirection"])
    {
        $tickerDirection = $atts["tickerDirection"];
    }
    if($atts["tickerHover"])
    {
        $tickerHover = $atts["tickerHover"];
    }
    if($atts["easing"])
    {
        $easing = $atts["easing"];
    }

    static $slideID;
    
    if(!$slideID)
    {
        $slideID = 0;
    }

    $slideID++;
    
    $nextTD = "";
    $prevTD = "";
    if($controls == "true")
    {
        $nextTD = "<td class=\"bx-td\" valign=\"middle\"><div id=\"nextSel".$slideID."\" style=\"width:30px; margin-left:20px;\"></div></td>";
        $prevTD = "<td class=\"bx-td\" valign=\"middle\"><div id=\"prevSel".$slideID."\" style=\"width:30px; margin-right:20px;\"></div></td>";
        $width = $width - 100;
    }
    
	$htmlOutput = "<script src=\"".WP_PLUGIN_URL."/cslider/scripts/jquery-latest.js\" type=\"text/javascript\"></script>
    <script src=\"".WP_PLUGIN_URL."/cslider/scripts/jquery.bxSlider.min.js\" type=\"text/javascript\"></script>
    <script src=\"".WP_PLUGIN_URL."/cslider/scripts/jquery.easing.1.3.js\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\">
    $(document).ready(function(){
    $('.cslider".$slideID."').bxSlider({
        prevSelector:'#prevSel".$slideID."',
        nextSelector:'#nextSel".$slideID."',
        mode:'".$mode."',
        speed:".$speed.",
        infiniteLoop:".$infiniteLoop.",
        controls:".$controls.",
        startingSlide:".$startingSlide.",
        randomStart:".$randomStart.",
        hideControlOnEnd:".$hideControlOnEnd.",
        auto:".$auto.",
        pause:".$pause.",
        autoDirection:'".$autoDirection."',
        autoHover:".$autoHover.",
        pager:".$pager.",
        pagerLocation:'".$pagerLocation."',
        ticker:".$ticker.",
        tickerSpeed:".$tickerSpeed.",
        tickerDirection:'".$tickerDirection."',
        tickerHover:".$tickerHover.",
        easing:'".$easing."'});
    });
    </script>
    <style>
    .bx-td {
        padding:0;
        margin:0;
    }
    .bx-td *
    {
        clear:none;
    }
    .bx-slide-slide".$slideID." {
        width: ".$width."px;
    }
    .bx-next {
        position:absolute;
        width: 30px;
        height: 30px;
        text-indent: -999999px;
        background: url(".WP_PLUGIN_URL."/cslider/gray_next.png) no-repeat 0 -30px;
    }
    .bx-prev {
        position:absolute;
        width: 30px;
        height: 30px;
        text-indent: -999999px;
        background: url(".WP_PLUGIN_URL."/cslider/gray_prev.png) no-repeat 0 -30px;
    }
    .bx-pager a {
        display:block;
        float:left;
        margin-right: 5px;
        margin-top:10px;
        margin-bottom:10px;
        width:10px;
        height:11px;
        color: #fff;
        padding: 0 0 0 0;
        text-indent: -999999px;
        font-size: 12px;
        zoom:1;
        background: url(".WP_PLUGIN_URL."/cslider/gray_pager.png) no-repeat 0 -10px;
    }
    .bx-pager .pager-active {
        background: url(".WP_PLUGIN_URL."/cslider/gray_pager.png) no-repeat 0 0;
    }
    </style>
    <table style=\"width:".$width."px;\"><tr>".$prevTD."<td class=\"bx-td\">
    <div class=\"cslider".$slideID."\">";
    $slides = explode("[slide]", $content);
    for($a = 0; $a < sizeof($slides); $a++)
    {
        $htmlOutput .= "<div class=\"bx-slide-slide".$slideID."\">".$slides[$a]."</div>";
    }
    $htmlOutput .= "</div></td>".$nextTD."</tr></table>";
    return do_shortcode($htmlOutput);
}
add_shortcode("cSlider", "cSlider");

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////// Hover image admin panel //////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function set_cslide_options() // Called while activating the Plugin
{
	add_option("width", "300");
    add_option("mode", "horizontal");
    add_option("speed", "500");
    add_option("infiniteLoop", "true");
    add_option("controls", "true");
    add_option("startingSlide", "0");
    add_option("randomStart", "false");
    add_option("hideControlOnEnd", "false");
    add_option("auto", "false");
    add_option("pause", "3000");
    add_option("autoDirection", "next");
    add_option("autoHover", "false");
    add_option("pager", "true");
    add_option("pagerLocation", "bottom");
    add_option("ticker", "false");
    add_option("tickerSpeed", "5000");
    add_option("tickerDirection", "next");
    add_option("tickerHover", "false");
    add_option("easing", "swing");
}

function unset_cslide_options() // Called while deactivating the Plugin
{
	delete_option("width");
	delete_option("mode");
	delete_option("speed");
	delete_option("infiniteLoop");
	delete_option("controls");
	delete_option("startingSlide");
	delete_option("randomStart");
	delete_option("hideControlOnEnd");
	delete_option("auto");
	delete_option("pause");
	delete_option("autoDirection");
	delete_option("autoHover");
	delete_option("pager");
	delete_option("pagerLocation");
	delete_option("ticker");
	delete_option("tickerSpeed");
	delete_option("tickerDirection");
	delete_option("tickerHover");
	delete_option("easing");
}

register_activation_hook(__FILE__, "set_cslide_options");
register_deactivation_hook(__FILE__, "unset_cslide_options");

function admin_cslide_options() // Including the form for the Plugin settings into Settings Page
{
	?><div class="wrap"><h2><?php _e("cSlider Settings", "cslider"); ?> (<?php _e("Version", "cslider"); ?> <?php echo getPluginVersion(); ?>)</h2><?php
	
	if($_REQUEST["submit"])
	{
		update_cslide_options();
	}
	print_cslide_form();
	
	?></div><?php
}

function update_cslide_options() // Update function for the plugin Settings
{
	$ok = false;
	
	if($_REQUEST["width"])
	{
		update_option("width", $_REQUEST["width"]);
		$ok = true;
	}
	if($_REQUEST["mode"])
	{
		update_option("mode", $_REQUEST["mode"]);
		$ok = true;
	}
	if($_REQUEST["speed"])
	{
		update_option("speed", $_REQUEST["speed"]);
		$ok = true;
	}
	if($_REQUEST["infiniteLoop"] == "on")
	{
		update_option("infiniteLoop", "true");
		$ok = true;
	}
    else
	{
		update_option("infiniteLoop", "false");
		$ok = true;
	}
	if($_REQUEST["controls"] == "on")
	{
		update_option("controls", "true");
		$ok = true;
	}
    else
	{
		update_option("controls", "false");
		$ok = true;
	}
	if(($_REQUEST["startingSlide"]) && ($_REQUEST["startingSlide"] != "0"))
	{
		update_option("startingSlide", $_REQUEST["startingSlide"]);
		$ok = true;
	}
    elseif($_REQUEST["startingSlide"] == "0")
    {
		update_option("startingSlide", "0");
		$ok = true;
	}
	if($_REQUEST["randomStart"] == "on")
	{
		update_option("randomStart", "true");
		$ok = true;
	}
    else
	{
		update_option("randomStart", "false");
		$ok = true;
	}
	if($_REQUEST["hideControlOnEnd"] == "on")
	{
		update_option("hideControlOnEnd", "true");
		$ok = true;
	}
    else
	{
		update_option("hideControlOnEnd", "false");
		$ok = true;
	}
	if($_REQUEST["auto"] == "on")
	{
		update_option("auto", "true");
		$ok = true;
	}
    else
	{
		update_option("auto", "false");
		$ok = true;
	}
	if($_REQUEST["pause"])
	{
		update_option("pause", $_REQUEST["pause"]);
		$ok = true;
	}
	if($_REQUEST["autoDirection"])
	{
		update_option("autoDirection", $_REQUEST["autoDirection"]);
		$ok = true;
	}
	if($_REQUEST["autoHover"] == "on")
	{
		update_option("autoHover", "true");
		$ok = true;
	}
    else
	{
		update_option("autoHover", "false");
		$ok = true;
	}
	if($_REQUEST["pager"] == "on")
	{
		update_option("pager", "true");
		$ok = true;
	}
    else
	{
		update_option("pager", "false");
		$ok = true;
	}
	if($_REQUEST["pagerLocation"])
	{
		update_option("pagerLocation", $_REQUEST["pagerLocation"]);
		$ok = true;
	}
	if($_REQUEST["ticker"] == "on")
	{
		update_option("ticker", "true");
		$ok = true;
	}
    else
	{
		update_option("ticker", "false");
		$ok = true;
	}
	if($_REQUEST["tickerSpeed"])
	{
		update_option("tickerSpeed", $_REQUEST["tickerSpeed"]);
		$ok = true;
	}
	if($_REQUEST["tickerDirection"])
	{
		update_option("tickerDirection", $_REQUEST["tickerDirection"]);
		$ok = true;
	}
	if($_REQUEST["tickerHover"] == "on")
	{
		update_option("tickerHover", "true");
		$ok = true;
	}
    else
	{
		update_option("tickerHover", "false");
		$ok = true;
	}
    if($_REQUEST["easing"] != "")
    {
        update_option("easing", $_REQUEST["easing"]);
        $ok = true;
    }
    else
    {
        $ok = false;
    }
	if($ok)
	{
		?><div id="message" class="updated fade">
			<p>Changes saved.</p>
		</div><?php
	}
	else
	{
		?><div id="message" class="error fade">
			<p>Failed to save changes.</p>
		</div><?php
	}
}

function print_cslide_form() // Form for the Plugin Settings
{
    $width = get_option("width");
    $mode = get_option("mode");
    $speed = get_option("speed");
    $infiniteLoop = get_option("infiniteLoop");
    $controls = get_option("controls");
    $startingSlide = get_option("startingSlide");
    $randomStart = get_option("randomStart");
    $hideControlOnEnd = get_option("hideControlOnEnd");
    $auto = get_option("auto");
    $pause = get_option("pause");
    $autoDirection = get_option("autoDirection");
    $autoHover = get_option("autoHover");
    $pager = get_option("pager");
    $pagerLocation = get_option("pagerLocation");
    $ticker = get_option("ticker");
    $tickerSpeed = get_option("tickerSpeed");
    $tickerDirection = get_option("tickerDirection");
    $tickerHover = get_option("tickerHover");
    $easing = get_option("easing");
	?>
	<form method="post">
		<table cellspacing="10">
            <thead>
                <tr>
                    <th style="text-align:left;">
                        <?php _e("cSlider default Settings", "cslider"); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php _e("Width:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="text" name="width" value="<?php echo $width; ?>" /> px
                    </td>
                    <td>
                        <i><?php _e("The default width for sliders content.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Transition Mode:", "cslider"); ?>
                    </td>
                    <td>
                        <select name="mode">
                            <option <?php if($mode == "horizontal"){echo "selected";} ?> value="horizontal"><?php _e("Horizontal", "cslider"); ?></option>
                            <option <?php if($mode == "vertical"){echo "selected";} ?> value="vertical"><?php _e("Vertical", "cslider"); ?></option>
                            <option <?php if($mode == "fade"){echo "selected";} ?> value="fade"><?php _e("Crossfade", "cslider"); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Transition Speed:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="number" min="0" name="speed" value="<?php echo $speed; ?>" /> ms
                    </td>
                    <td>
                        <i><?php _e("The default speed for transitions.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Easing:", "cslider"); ?>
                    </td>
                    <td>
                        <select name="easing">
                            <option <?php if($easing == "swing"){echo "selected";} ?> value="swing">swing</option>
                            <option <?php if($easing == "easeInQuad"){echo "selected";} ?> value="easeInQuad">easeInQuad</option>
                            <option <?php if($easing == "easeOutQuad"){echo "selected";} ?> value="easeOutQuad">easeOutQuad</option>
                            <option <?php if($easing == "easeInOutQuad"){echo "selected";} ?> value="easeInOutQuad">easeInOutQuad</option>
                            <option <?php if($easing == "easeInCubic"){echo "selected";} ?> value="easeInCubic">easeInCubic</option>
                            <option <?php if($easing == "easeOutCubic"){echo "selected";} ?> value="easeOutCubic">easeOutCubic</option>
                            <option <?php if($easing == "easeInOutCubic"){echo "selected";} ?> value="easeInOutCubic">easeInOutCubic</option>
                            <option <?php if($easing == "easeInQuart"){echo "selected";} ?> value="easeInQuart">easeInQuart</option>
                            <option <?php if($easing == "easeOutQuart"){echo "selected";} ?> value="easeOutQuart">easeOutQuart</option>
                            <option <?php if($easing == "easeInOutQuart"){echo "selected";} ?> value="easeInOutQuart">easeInOutQuart</option>
                            <option <?php if($easing == "easeInQuint"){echo "selected";} ?> value="easeInQuint">easeInQuint</option>
                            <option <?php if($easing == "easeOutQuint"){echo "selected";} ?> value="easeOutQuint">easeOutQuint</option>
                            <option <?php if($easing == "easeInOutQuint"){echo "selected";} ?> value="easeInOutQuint">easeInOutQuint</option>
                            <option <?php if($easing == "easeInSine"){echo "selected";} ?> value="easeInSine">easeInSine</option>
                            <option <?php if($easing == "easeOutSine"){echo "selected";} ?> value="easeOutSine">easeOutSine</option>
                            <option <?php if($easing == "easeInOutSine"){echo "selected";} ?> value="easeInOutSine">easeInOutSine</option>
                            <option <?php if($easing == "easeInExpo"){echo "selected";} ?> value="easeInExpo">easeInExpo</option>
                            <option <?php if($easing == "easeOutExpo"){echo "selected";} ?> value="easeOutExpo">easeOutExpo</option>
                            <option <?php if($easing == "easeInOutExpo"){echo "selected";} ?> value="easeInOutExpo">easeInOutExpo</option>
                            <option <?php if($easing == "easeInCirc"){echo "selected";} ?> value="easeInCirc">easeInCirc</option>
                            <option <?php if($easing == "easeOutCirc"){echo "selected";} ?> value="easeOutCirc">easeOutCirc</option>
                            <option <?php if($easing == "easeInOutCirc"){echo "selected";} ?> value="easeInOutCirc">easeInOutCirc</option>
                            <option <?php if($easing == "easeInElastic"){echo "selected";} ?> value="easeInElastic">easeInElastic</option>
                            <option <?php if($easing == "easeOutElastic"){echo "selected";} ?> value="easeOutElastic">easeOutElastic</option>
                            <option <?php if($easing == "easeInOutElastic"){echo "selected";} ?> value="easeInOutElastic">easeInOutElastic</option>
                            <option <?php if($easing == "easeInBack"){echo "selected";} ?> value="easeInBack">easeInBack</option>
                            <option <?php if($easing == "easeOutBack"){echo "selected";} ?> value="easeOutBack">easeOutBack</option>
                            <option <?php if($easing == "easeInOutBack"){echo "selected";} ?> value="easeInOutBack">easeInOutBack</option>
                            <option <?php if($easing == "easeInBounce"){echo "selected";} ?> value="easeInBounce">easeInBounce</option>
                            <option <?php if($easing == "easeOutBounce"){echo "selected";} ?> value="easeOutBounce">easeOutBounce</option>
                            <option <?php if($easing == "easeInOutBounce"){echo "selected";} ?> value="easeInOutBounce">easeInOutBounce</option>
                        </select>
                    </td>
                    <td>
                        <i><?php _e("The easing curve for transitions.", "cslider"); ?></i>
                    </td>
                </tr>
                    <td>
                        <?php _e("Infinite Loop:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="infiniteLoop" <?php if($infiniteLoop == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Whether the slides should repeat.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Show navigation arrows:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="controls" <?php if($controls == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Start slide index:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="number" min="0" name="startingSlide" value="<?php echo $startingSlide; ?>" />
                    </td>
                    <td>
                        <i><?php _e("The index of the first slide to appear.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Random start:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="randomStart" <?php if($randomStart == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Whether the first slide to appear is random.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strike><?php _e("Hide controls at flanks", "cslider"); ?></strike>:
                    </td>
                    <td>
                        <input type="checkbox" disabled name="hideControlOnEnd" <?php if($hideControlOnEnd == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Not working yet!", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Auto sliding:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="auto" <?php if($auto == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Automated sliding. Before every slide a delay of \"pause\" field.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Pause between slides:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="number" min="0" name="pause" value="<?php echo $pause; ?>" /> ms
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Automated slide direction:", "cslider"); ?>
                    </td>
                    <td>
                        <select name="autoDirection">
                            <option <?php if($autoDirection == "next"){echo "selected";} ?> value="next"><?php _e("Next", "cslider"); ?></option>
                            <option <?php if($autoDirection == "prev"){echo "selected";} ?> value="prev"><?php _e("Previous", "cslider"); ?></option>
                        </select>
                    </td>
                    <td>
                        <i><?php _e("The slide direction of automated slides.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Pause automated slides on hover:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="autoHover" <?php if($autoHover == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Pauses the automated sliding on mouseover.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Pager:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="pager" <?php if($pager == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Displays the page navigation.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Pager location:", "cslider"); ?>
                    </td>
                    <td>
                        <select name="pagerLocation">
                            <option <?php if($pagerLocation == "bottom"){echo "selected";} ?> value="bottom"><?php _e("Bottom", "cslider"); ?></option>
                            <option <?php if($pagerLocation == "top"){echo "selected";} ?> value="top"><?php _e("Top", "cslider"); ?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Ticker:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="ticker" <?php if($ticker == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Whether the slider should slide continuously with a speed of \"Ticker speed\" field.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Ticker speed:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="number" min="1" max="5000" name="tickerSpeed" value="<?php echo $tickerSpeed; ?>" />
                    </td>
                    <td>
                        <i><?php _e("A value between 1 and 5000.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Ticker direction:", "cslider"); ?>
                    </td>
                    <td>
                        <select name="tickerDirection">
                            <option <?php if($tickerDirection == "next"){echo "selected";} ?> value="next"><?php _e("Next", "cslider"); ?></option>
                            <option <?php if($tickerDirection == "prev"){echo "selected";} ?> value="prev"><?php _e("Previous", "cslider"); ?></option>
                        </select>
                    </td>
                    <td>
                        <i><?php _e("The slide direction of the tciker.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php _e("Stop ticker on hover:", "cslider"); ?>
                    </td>
                    <td>
                        <input type="checkbox" name="tickerHover" <?php if($tickerHover == "true"){echo "checked=\"checked\"";} ?> />
                    </td>
                    <td>
                        <i><?php _e("Pauses the ticker on mouseover.", "cslider"); ?></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="<?php _e('Save settings', 'cslider'); ?>" />
                    </td>
                </tr>
            </tbody>
		</table>
	</form>
	<?php
}

function add_cSliderOptions() // The Function that adds The Plugin to the menu
{
	add_options_page("cSlider", "cSlider", "manage_options", __FILE__, "admin_cslide_options");
}
add_action("admin_menu", "add_cSliderOptions"); // Call the function above into "admin_menu"
        
function cSliderInit()
{
    load_plugin_textdomain("cslider", false, dirname(plugin_basename(__FILE__))."/languages/");
}
add_action("init", "cSliderInit");
        
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////// Supporting functions /////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
function getPluginVersion()
{
    $pluginData = get_plugin_data(__FILE__);
    return $pluginData['Version'];
}
?>
