=== CKEditor Shortcode  ===

Contributors: Yogesh Joshi
Tags: CKEditor, shortcode, wysiwyg, text editor, wordpress editor  
Requires at least: 5.0  
Tested up to: 6.4  
Requires PHP: 7.4  
Stable tag: 1.1  
License: GNU3
Github : https://github.com/yogesh-joshi-0333/wp-ckeditor-shortcode
Website : https://devyogesh.com/wp-ckeditor-shortcode/  
License URI: https://www.gnu.org/licenses/gpl-3.0.html  

== Description ==
CKEditor Shortcode Pro allows you to add a powerful WYSIWYG editor to any WordPress page using a simple shortcode.

🎯 **Features**:
✔ Add CKEditor anywhere with `[ckeditor]`  
✔ Fully customizable (height, width, styles, themes)  
✔ Supports **self-hosted CKEditor**  
✔ Uses **Kama theme** for CKEditor UI  

== Installation ==
There are **three ways** to install this plugin:

🖥️ **Method 1: Install via WordPress Admin (Recommended)**
1. Go to **Plugins > Add New**.
2. Click **Upload Plugin** and select `ckeditor-shortcode-pro.zip`.
3. Click **Install Now**, then **Activate**.

🗂️ **Method 2: Manual FTP Upload**
1. Extract `ckeditor-shortcode-pro.zip`.
2. Upload the `ckeditor-shortcode-pro` folder to `/wp-content/plugins/`.
3. Go to **Plugins > Installed Plugins** and activate **CKEditor Shortcode Pro**.

💻 **Method 3: Self-Hosted CKEditor**
1. Upload **CKEditor files** to your own server.
2. Edit `ckeditor-init.js` and set:
   ```js
   CKEDITOR_BASEPATH = "https://yourdomain.com/path-to-ckeditor/";
   ```
3. Ensure the correct **Kama theme** is applied.

== Usage ==
📌 **Add CKEditor to Any Page or Post**:
Simply insert this shortcode in your content:
```
[ckeditor class="custom-editor" height="400px" width="100%" styles="border:1px solid #ddd; padding:10px;"]
```
💡 **Customizing the Editor**:
- Change height: `height="500px"`
- Change width: `width="80%"`
- Apply styles: `styles="border: 2px solid red;"`

🖌 **Using the Kama Theme for CKEditor**
This plugin comes with **Kama theme** pre-installed. If you want to apply it manually:
1. Upload the **Kama theme** inside `assets/ckeditor/skins/`.
2. Update `ckeditor-init.js`:
   ```js
   CKEDITOR.replace(textarea.id, { skin: 'kama' });
   ```

== Frequently Asked Questions ==
🔹 **Does this plugin work with Gutenberg?**  
Yes! Use the shortcode block to insert CKEditor.

🔹 **Can I use my own CKEditor version?**  
Yes! Just upload it to your server and update `ckeditor-init.js`.

🔹 **How do I remove the default toolbar buttons?**  
Edit `ckeditor-init.js` and modify the `toolbar` settings.

== Changelog ==
= 1.0 (March 2025) =
- Initial release 🎉
- Added support for **self-hosted CKEditor**
- Default **Kama theme** for better UI
- Improved shortcode handling


== FYI ==
this version adds **self-hosted CKEditor support** and **Kama theme UI**.

== Screenshots ==
1. CKEditor in action  
2. Shortcode usage  
3. Kama theme applied  

== License & Credits ==
Here’s the corrected version with **GPL-3.0**:  

**This plugin is open-source under the [GNU General Public License v3.0 (GPL-3.0)](https://www.gnu.org/licenses/gpl-3.0.html).**  
Credits: **[CKEditor Team](https://ckeditor.com)**  
