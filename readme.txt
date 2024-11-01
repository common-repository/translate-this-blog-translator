=== Translation ===
Contributors: webdevtsu
Tags: translation, translator, free, website, blog, translate, translate this, google translate, babelfish, promt, freetranslations, freetranslation
Requires at least: 2.7.0
Tested up to: 4.4.2
Stable tag: trunk
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The best translator plugin for WordPress, over 100 languages are automatically translated easily and instantly. By Translation Cloud.

== Description ==

Allows your users to translate your blog into many different languages. The button is added to the top of every post.

A free **translation** button provided by [Translation Cloud](http://www.translation-services-usa.com/ "free translation") allowing visitors to **translate** 
your website into 100 languages. Translation is powered by Google Translate and combines all its translation functionality into one 
small, easy to use button. Once installed, the button will appear at the top of the individual posts.

For **over 10 years,** Translation Cloud has provided professional translation solutions to indivduals and businesses around the world. 
That's how you know you can trust the Translation plugin for WordPress to convey your blog's meaning in the fastest, easiest, and least invasive way possible.
Just check out this video for more information on Translation Cloud:

[youtube http://www.youtube.com/watch?v=Pd-7C7ecoKQ]

If you have a registered [ConveyThis](http://www.conveythis.com/) account, you can integrate your account with the Translation plugin by Translation Cloud to provide even better, faster results.

Translation supports over 100 languages.

== Installation ==

1. Upload translate-this-blog-translator folder to the /wp-content/plugins/ directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. If your website is not in English, go to the settings page and select the language from the dropdown menu.
1. If selecting a language has no effect, you may want to check the "use valid jQuery" checkbox. (Caution: may cause conflicts with other plugins or themes.)
1. If you are using any caching plugins, such as WP Super Cache, you will need to clear your cached pages after updating your Translate This settings.

== Screenshots ==

1. The button on a sample post.
2. The open menu on a sample post.

== ConveyThis Integration ==

You **do not** need a ConveyThis account or Google Translate API key to use the Translation plugin. Translation is totally free and works "out of the box" with no additional setup or registrations required.

But if you have a [registered ConveyThis account](http://www.conveythis.com/), you can enter your username into the **Settings** page to activate the account benefits on your WordPress blog (**note:** be sure to add your blog URL to the approved domains list in your account settings).

= Don't know how to get an API key? =

This is a bit technical, so be sure to read up on [how to create an API key](https://cloud.google.com/translate/v2/getting_started#setup) (don't worry about the other technical information—ConveyThis will handle the rest) and what [Google's pricing structure](https://cloud.google.com/translate/v2/pricing) is for using their service if you want to incorporate this feature on your site. You will never be charged by **ConveyThis** for this service.

**Note:** when creating an API key with Google, select the "browser key" option and leave the "accept requests from these HTTP referrers" option blank—you can limit the sites that use the key from your ConveyThis account directly, and your API key will not be visible by third-parties.

Registered users with a Google Translate API Key can translate their blog text directly on-page without redirecting through a separate frame. Read more at the [ConveyThis help](http://www.conveythis.com/help.php#8) page.

= Try it out! =

Want to get a feel for how your blog will be translated with a registered ConveyThis account and Google Translate API Key? 
You can easily test out the benefits of a ConveyThis account without registering or signing up for a Google API key. In the plugin settings page, just check the "try API-powered translation" checkbox and click save.

== Changelog ==

= 2.5.0 =
* Branding is now optional.

= 2.4.1 =
* Images and javascript are now loaded directly from the plugins directory, rather than a remote URL.

= 2.4.0 =
* Fixed bug where button script was included in admin pages.
* Added "reset options" page.
* Included an optional free trial of Google API-powered translation.

= 2.2.2 =
* Fixed bug with hidden button text being displayed in post excerpts.

= 2.2.1 =
* Updated to the latest version of the plugin.
* Language options and button style updated.
* Code is much more lightweight now.

= 2.0 =
* Added a plugin settings page for updating blog source language, jQuery override options on the fly.

== Upgrade Notice ==

= 2.4.0 =
Translation plugin now includes a free trial of Google API-powered translation!

= 2.2.5 =
Now supporting 100+ languages.

== Frequently Asked Questions ==

= When will you be adding support for new languages? =

Since the button only uses Google Translate, we have no control of when new languages will be available. Once Google 
does add a new language, we try to add support for that language as quickly as possible.

= Google added a new language, and it's not available through Translate This. Why is that? =

When Google adds a new language it is not automatically available through Translate This. This is because we must make internal changes 
to our program telling it the language is available and how to handle it. Also, we need to add a flag image for that language. We make every 
effort to keep the translator's available language list as up to date as possible.