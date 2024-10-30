=== cSlider ===
Contributors: julian.weinert
Tags: cslider, c slider, content slider, content, slider, content slideshow, slideshow, bxslider, csundm, csundm berlin, cs&m, jQuery
Requires at least: 2.0
Tested up to: 3.2.1
Stable tag: 2.4.2

cSlider is easy-to-use. Create beautiful and stunning content sliders!
This is the most simple and innovative content slider available for WordPress.

== Description ==

Add content slides with a simple shortcode "[cSlider]" and divide all slides with "[slide]". Close the shortcode after all slides with "[/cSlider]".
Change your default settings in the admin panel.

NOTE: Please update to the latest version (2.4.1) if you recognize any bug!

Overwrite the defaults for each cSlider with these shortcode attributes:

1. width (in px)
1. mode {horizontal, vertical, fade}
1. speed (in ms)
1. infititeLoop {true, false}
1. controls {true, false}
1. startingSlide (index of the first slide to appear)
1. randomStart {true, false} (whether the first slide to appear is random)
1. auto {true, false} (automated sliding)
1. pause (in ms) (pause between auto slides)
1. autoDirection {next, prev} (direction of auto slides)
1. autoHover {true, false} (stop auto slides on mouseover)
1. pager {true, false} (show the page navigation)
1. pagerLocation {bottom, top}
1. ticker {true, false} (slide continuously)
1. tickerDirection {next, rev} (direction of ticker)
1. tickerHover {true, false} (stop ticker slides on mouseover)
1. easing (see [http://gsgd.co.uk/sandbox/jquery/easing/](http://gsgd.co.uk/sandbox/jquery/easing/ "jQuery easing website") for easing options)

If you like cSlider and want to use it in your language, feel free to contact me to create translations! Thanks

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `cslider` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Change settings under Settings --> cSlider
1. Place `[cSlider] ... [slide] ... [/cSlider]` in your posts or pages and place all slides divided by "[slide]" inside of it.

== Changelog ==

* 1.0	First stable build
* 1.1	Updates settings page
* 2.0	Addes support for shortcodes within the slides
* 2.1	Addes german translation
* 2.1.1	Fixes Pager design issue
* 2.2	Fixes an issue while first usage
* 2.2.1	Fixes an width issue
* 2.3	Adds support for multiple cSliders on one page or post,
	Fixes white borders when controls disabled
* 2.3.1 Fixes a bug while saving the "pause" default value
* 2.3.2 Some grafical inprovements
* 2.3.3 Improves the identification function for multiple cSliders
* 2.3.4 Fixes an issue occuring with combination with other plugins and some CSS
* 2.3.5 Fixes an bug that causes cSlider to be 100px narrow if controll arrows are deactivated
* 2.4.0 Adds easing support
* 2.4.1 Includes external scripts right into cSlider's local directory
* 2.4.2 Simple CSS fix for some browsers and old browser versions

== Frequently Asked Questions ==

= How can I set custom layout and options? =

Go to Settings --> cSlider and change it to what fits your needs best

= Can I overwrite the defaults for each slide on my page? =

Yes. Use all the shortcode attributes you can find in the description of this plugin.

= Can I use multiple cSliders on one page or post? =

Yes, since version 2.3! Simply use [cSlider] ... [slide] ... [/cSlider] as often as you want. Please be sure you close the [cSlider] each time you use it!

== Screenshots ==

1. cSlider default settings panel
2. How to use the shortcakes
3. What it will look like in the front end

