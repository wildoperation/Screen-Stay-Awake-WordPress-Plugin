=== Screen Stay Awake ===
Contributors: wildoperation, timstl
Tags: screen, lock, wakelock, recipes, howto
Requires at least: 6.2
Tested up to: 6.6
Stable tag: 1.0.1
Requires PHP: 7.4
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

Screen Stay Awake prevents your website visitor's screen from turning off. The Screen Wake Lock API is used and no visitor prompt is required.

== Description ==

Screen Stay Awake sends a request to your visitor's browser asking it to keep their device's screen on and prevent locking. This happens in the background and no user prompt is required. Screen Stay Awake is important for recipe websites and other how-to, informational websites. In these cases a visitor may go long periods without interacting with your site but still want to be able to read your content.

To accomplish this, Screen Stay Awake uses the Screen Wake Lock browser API. The request is sent on page load. Some browsers, such as iOS Safari, require the user to interact with your site prior to honoring the wake lock request. In these cases, Screen Stay Awake will also request the screen stay on after clicks, touches, and scrolls.

For information on browser support, please view the [WakeLock: request() Documentation](https://developer.mozilla.org/en-US/docs/Web/API/WakeLock/request)