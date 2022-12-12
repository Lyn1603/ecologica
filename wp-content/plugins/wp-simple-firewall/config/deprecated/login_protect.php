{
  "slug":          "login_protect",
  "properties":    {
    "slug":                  "login_protect",
    "load_priority":         100,
    "name":                  "Login Guard",
    "namespace":             "LoginGuard",
    "sidebar_name":          "Login Protection",
    "show_module_menu_item": false,
    "show_module_options":   true,
    "storage_key":           "loginprotect",
    "tagline":               "Block brute force attacks and secure user identities with Two-Factor Authentication",
    "show_central":          true,
    "access_restricted":     true,
    "premium":               false,
    "run_if_whitelisted":    true,
    "run_if_verified_bot":   false,
    "run_if_wpcli":          false,
    "order":                 40
  },
  "reqs":          {
    "dbs": [
      "botsignal"
    ]
  },
  "menus":         {
    "config_menu_priority": 30
  },
  "wpcli":         {
    "enabled": true
  },
  "admin_notices": {
    "email-verification-sent": {
      "id":               "email-verification-sent",
      "schedule":         "conditions",
      "plugin_page_only": true,
      "can_dismiss":      false,
      "type":             "warning",
      "plugin_admin":     "yes",
      "valid_admin":      true
    }
  },
  "sections":      [
    {
      "slug":        "section_brute_force_login_protection",
      "primary":     true,
      "title":       "Brute Force Login Guard",
      "title_short": "Brute Force",
      "beacon_id":   325,
      "summary":     [
        "Purpose - Blocks brute force hacking attacks against your login and registration pages.",
        "Recommendation - Use of this feature is highly recommend."
      ]
    },
    {
      "slug":        "section_twofactor_auth",
      "title":       "Multi-Factor Authentication",
      "title_short": "2-Factor Auth",
      "beacon_id":   326,
      "summary":     [
        "Purpose - Verifies the identity of users who log in to your site - i.e. they are who they say they are.",
        "Recommendation - Use of this feature is highly recommend. However, if your host blocks email sending you may lock yourself out.",
        "Note: You may combine multiple authentication factors for increased security."
      ]
    },
    {
      "slug":        "section_2fa_email",
      "title":       "Email Two-Factor Authentication",
      "title_short": "2FA - Email",
      "beacon_id":   246,
      "summary":     [
        "Purpose - Verifies the identity of users who log in to your site using email-based one-time-passwords.",
        "Recommendation - Use of this feature is highly recommend. However, if your host blocks email sending you may lock yourself out.",
        "Note: You may combine multiple authentication factors for increased security."
      ]
    },
    {
      "slug":        "section_2fa_ga",
      "title":       "Google Authenticator Two-Factor Authentication",
      "title_short": "2FA - Google Authenticator",
      "beacon_id":   244,
      "summary":     [
        "Purpose - Verifies the identity of users who log in to your site using Google Authenticator one-time-passwords.",
        "Recommendation - Use of this feature is highly recommend. However, if your host blocks email sending you may lock yourself out.",
        "Note: You may combine multiple authentication factors for increased security."
      ]
    },
    {
      "slug":        "section_hardware_authentication",
      "title":       "Hardware 2-Factor Authentication",
      "title_short": "2FA - Hardware",
      "beacon_id":   249,
      "summary":     [
        "Purpose - Verifies the identity of users who log in to your site using Yubikey one-time-passwords.",
        "Note: You may combine multiple authentication factors for increased security."
      ]
    },
    {
      "slug":        "section_rename_wplogin",
      "title":       "Hide WP Login Page",
      "title_short": "Hide Login Page",
      "beacon_id":   316,
      "summary":     [
        "Purpose - To hide your wp-login.php page from brute force attacks and hacking attempts - if your login page cannot be found, no-one can login.",
        "Recommendation - This is not required for complete security and if your site has irregular or inconsistent configuration it may not work for you."
      ]
    },
    {
      "slug":        "section_user_messages",
      "title":       "User Messages",
      "title_short": "User Messages",
      "beacon_id":   139,
      "summary":     [
        "Purpose - Customize the messages shown to visitors.",
        "Recommendation - Be sure to change the messages to suit your audience.",
        "Hint - To reset any message to its default, enter the text exactly: default"
      ]
    },
    {
      "slug":        "section_enable_plugin_feature_login_protection",
      "title":       "Disable Login Guard Module",
      "title_short": "Disable",
      "beacon_id":   249,
      "summary":     [
        "Purpose - Login Guard blocks all automated and brute force attempts to log in to your site.",
        "Recommendation - Keep the Login Guard module turned on."
      ]
    },
    {
      "slug":        "section_deprecated",
      "title":       "Deprecated",
      "title_short": "Deprecated",
      "summary":     [
        "These options will be removed in the future. Please use the ADE option under Bot SPAM section."
      ]
    },
    {
      "slug":   "section_non_ui",
      "hidden": true
    }
  ],
  "options":       [
    {
      "key":         "enable_login_protect",
      "section":     "section_enable_plugin_feature_login_protection",
      "advanced":    true,
      "default":     "Y",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/51",
      "link_blog":   "https://shsec.io/wpsf03",
      "beacon_id":   249,
      "name":        "Enable Login Guard",
      "summary":     "Enable (or Disable) The Login Guard Module",
      "description": "Un-Checking this option will completely disable the Login Guard module"
    },
    {
      "key":         "rename_wplogin_path",
      "section":     "section_rename_wplogin",
      "advanced":    true,
      "sensitive":   true,
      "default":     "",
      "type":        "text",
      "link_info":   "https://shsec.io/5q",
      "link_blog":   "https://shsec.io/5r",
      "beacon_id":   316,
      "name":        "Hide WP Login & Admin",
      "summary":     "Hide The WordPress Login And Admin Areas",
      "description": "Creating a path here will disable your 'wp-login.php'. Only letters and numbers are permitted: abc123"
    },
    {
      "key":         "rename_wplogin_redirect",
      "section":     "section_rename_wplogin",
      "advanced":    true,
      "sensitive":   true,
      "default":     "",
      "type":        "text",
      "link_info":   "https://shsec.io/5q",
      "link_blog":   "https://shsec.io/5r",
      "beacon_id":   455,
      "name":        "WP Login & Admin Redirect",
      "summary":     "Automatic Redirect URL For Hidden Pages",
      "description": "Automatically redirect requests to this location for the hidden pages."
    },
    {
      "key":           "mfa_verify_page",
      "section":       "section_twofactor_auth",
      "default":       "wp_login",
      "type":          "select",
      "value_options": [
        {
          "value_key": "wp_login",
          "text":      "WP Login Page"
        },
        {
          "value_key": "custom_shield",
          "text":      "Custom Shield MFA Page"
        }
      ],
      "link_info":     "",
      "link_blog":     "",
      "beacon_id":     0,
      "name":          "MFA Verification Page",
      "summary":       "Type Of MFA Verification Page",
      "description":   "Choose the page type for MFA verification"
    },
    {
      "key":           "mfa_user_setup_pages",
      "section":       "section_twofactor_auth",
      "type":          "multiple_select",
      "default":       [
        "profile"
      ],
      "value_options": [
        {
          "value_key": "profile",
          "text":      "WP User Profile Page"
        },
        {
          "value_key": "dedicated",
          "text":      "Dedicated WP Admin Page"
        }
      ],
      "link_info":     "",
      "link_blog":     "",
      "beacon_id":     456,
      "name":          "User 2FA Setup",
      "summary":       "User 2FA Setup Page Locations",
      "description":   "Pages available to users to configure 2FA."
    },
    {
      "key":         "mfa_skip",
      "section":     "section_twofactor_auth",
      "premium":     true,
      "type":        "integer",
      "default":     0,
      "min":         0,
      "link_info":   "https://shsec.io/b1",
      "link_blog":   "",
      "beacon_id":   141,
      "name":        "2FA Remember Me",
      "summary":     "A User Can Bypass Multi-Factor Authentication (MFA) For The Set Number Of Days",
      "description": "Enter the number of days a user can bypass future MFA after a successful MFA-login. 0 to disable."
    },
    {
      "key":         "allow_backupcodes",
      "section":     "section_twofactor_auth",
      "premium":     true,
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/dx",
      "link_blog":   "https://shsec.io/dy",
      "beacon_id":   143,
      "name":        "Allow Backup Codes",
      "summary":     "Allow Users To Generate A Backup Code",
      "description": "Allow users to generate a backup code that can be used to login if MFA factors are unavailable."
    },
    {
      "key":         "enable_google_authenticator",
      "section":     "section_2fa_ga",
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/shld7",
      "link_blog":   "https://shsec.io/shld6",
      "beacon_id":   245,
      "name":        "Enable Google Authenticator",
      "summary":     "Allow Users To Use Google Authenticator",
      "description": "When enabled, users will have the option to add Google Authenticator to their WordPress user profile."
    },
    {
      "key":         "enable_sms_auth",
      "section":     "section_non_ui",
      "premium":     true,
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "",
      "link_blog":   "",
      "beacon_id":   245,
      "name":        "Enable SMS Auth",
      "summary":     "Enable SMS Authentication",
      "description": "When enabled, users will have the option to add SMS Auth to their WordPress user profile."
    },
    {
      "key":         "enable_email_authentication",
      "section":     "section_2fa_email",
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/3t",
      "link_blog":   "https://shsec.io/9q",
      "beacon_id":   247,
      "name":        "Enable Email Authentication",
      "summary":     "Two-Factor Login Authentication By Email",
      "description": "All users will be required to verify their login by email-based two-factor authentication."
    },
    {
      "key":         "two_factor_auth_user_roles",
      "section":     "section_2fa_email",
      "advanced":    true,
      "type":        "array",
      "default":     [
        "contributor",
        "author",
        "editor",
        "administrator"
      ],
      "link_info":   "https://shsec.io/4v",
      "link_blog":   "",
      "beacon_id":   243,
      "name":        "Enforce - Email Authentication",
      "summary":     "All User Roles Subject To Email Authentication",
      "description": "Enforces email-based authentication on all users with the selected roles. Note: This setting only applies to email authentication."
    },
    {
      "key":         "email_any_user_set",
      "section":     "section_2fa_email",
      "premium":     true,
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/gj",
      "link_blog":   "",
      "beacon_id":   142,
      "name":        "Allow Any User",
      "summary":     "Allow Any User To Turn-On Two-Factor Authentication By Email",
      "description": "Allow Any User To Turn-On Two-Factor Authentication By Email."
    },
    {
      "key":         "enable_antibot_check",
      "section":     "section_brute_force_login_protection",
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/k0",
      "link_blog":   "https://shsec.io/jo",
      "beacon_id":   426,
      "name":        "AntiBot",
      "summary":     "Use AntiBot Detection Engine",
      "description": "Use Shield's AntiBot Detection Engine To Block Bots and Brute Force Attacks"
    },
    {
      "key":           "bot_protection_locations",
      "section":       "section_brute_force_login_protection",
      "type":          "multiple_select",
      "default":       [
        "login"
      ],
      "value_options": [
        {
          "value_key": "login",
          "text":      "Login"
        },
        {
          "value_key": "register",
          "text":      "Register"
        },
        {
          "value_key": "password",
          "text":      "Lost Password"
        },
        {
          "value_key": "checkout_woo",
          "text":      "Checkout (WooCommerce)"
        }
      ],
      "link_info":     "https://shsec.io/dv",
      "link_blog":     "",
      "beacon_id":     314,
      "name":          "Protection Locations",
      "summary":       "How Google reCAPTCHA Will Be Displayed",
      "description":   "Choose for which forms bot protection measures will be deployed."
    },
    {
      "key":         "login_limit_interval",
      "section":     "section_brute_force_login_protection",
      "type":        "integer",
      "default":     5,
      "min":         0,
      "link_info":   "https://shsec.io/3q",
      "link_blog":   "https://shsec.io/9o",
      "beacon_id":   242,
      "name":        "Login Cooldown Interval",
      "summary":     "Limit login attempts to every X seconds",
      "description": "WordPress will process only ONE login attempt for every number of seconds specified. Zero (0) turns this off."
    },
    {
      "key":         "enable_login_gasp_check",
      "section":     "section_deprecated",
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/3r",
      "link_blog":   "https://shsec.io/9n",
      "beacon_id":   313,
      "name":        "Bot Protection",
      "summary":     "Protect WP Login From Automated Login Attempts By Bots",
      "description": "Adds a dynamically (Javascript) generated checkbox to the login form that prevents bots using automated login techniques. Recommended: ON."
    },
    {
      "key":           "enable_google_recaptcha_login",
      "section":       "section_deprecated",
      "default":       "disabled",
      "type":          "select",
      "value_options": [
        {
          "value_key": "disabled",
          "text":      "Disabled"
        },
        {
          "value_key": "default",
          "text":      "Default Style"
        },
        {
          "value_key": "light",
          "text":      "Light Theme"
        },
        {
          "value_key": "dark",
          "text":      "Dark Theme"
        },
        {
          "value_key": "invisible",
          "text":      "Invisible"
        }
      ],
      "link_info":     "https://shsec.io/9m",
      "link_blog":     "",
      "beacon_id":     269,
      "name":          "CAPTCHA",
      "summary":       "Enable CAPTCHA",
      "description":   "Use CAPTCHA on the login screen."
    },
    {
      "key":         "antibot_form_ids",
      "section":     "section_deprecated",
      "advanced":    true,
      "premium":     true,
      "type":        "array",
      "default":     [],
      "link_info":   "https://shsec.io/hg",
      "link_blog":   "",
      "beacon_id":   144,
      "name":        "AntiBot Forms",
      "summary":     "Enter The IDs Of The 3rd Party Login Forms For Use With AntiBot JS",
      "description": "For Use With AnitBot JS (above)."
    },
    {
      "key":         "enable_u2f",
      "section":     "section_hardware_authentication",
      "premium":     true,
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/i9",
      "link_blog":   "",
      "name":        "Allow U2F",
      "summary":     "Allow Registration Of U2F Devices",
      "description": "Allow Registration Of U2F Devices."
    },
    {
      "key":         "enable_yubikey",
      "section":     "section_hardware_authentication",
      "default":     "N",
      "type":        "checkbox",
      "link_info":   "https://shsec.io/4f",
      "link_blog":   "https://shsec.io/9t",
      "beacon_id":   358,
      "name":        "Allow Yubikey OTP",
      "summary":     "Allow Yubikey Registration For One Time Passwords",
      "description": "Combined with your Yubikey API Key (below) this will form the basis of your Yubikey Authentication."
    },
    {
      "key":         "yubikey_app_id",
      "section":     "section_hardware_authentication",
      "sensitive":   true,
      "default":     "",
      "type":        "text",
      "link_info":   "https://shsec.io/4g",
      "link_blog":   "",
      "beacon_id":   360,
      "name":        "Yubikey App ID",
      "summary":     "Your Unique Yubikey App ID",
      "description": "Combined with your Yubikey API Key this will form the basis of your Yubikey Authentication."
    },
    {
      "key":         "yubikey_api_key",
      "section":     "section_hardware_authentication",
      "sensitive":   true,
      "default":     "",
      "type":        "text",
      "link_info":   "https://shsec.io/4g",
      "link_blog":   "",
      "beacon_id":   360,
      "name":        "Yubikey API Key",
      "summary":     "Your Unique Yubikey App API Key",
      "description": "Combined with your Yubikey App ID this will form the basis of your Yubikey Authentication."
    },
    {
      "key":         "text_imahuman",
      "section":     "section_deprecated",
      "sensitive":   true,
      "premium":     true,
      "default":     "default",
      "type":        "text",
      "link_info":   "https://shsec.io/dz",
      "link_blog":   "",
      "name":        "GASP Checkbox Text",
      "summary":     "The Message Displayed Next To The GASP Checkbox",
      "description": "You can change the text displayed to the user beside the checkbox if you need a customized message."
    },
    {
      "key":         "text_pleasecheckbox",
      "section":     "section_deprecated",
      "sensitive":   true,
      "premium":     true,
      "default":     "default",
      "type":        "text",
      "link_info":   "https://shsec.io/dz",
      "link_blog":   "",
      "name":        "GASP Alert Text",
      "summary":     "The Message Displayed If The User Doesn't Check The Box",
      "description": "You can change the text displayed to the user in the alert message if they don't check the box."
    },
    {
      "key":          "email_can_send_verified_at",
      "section":      "section_non_ui",
      "transferable": false,
      "type":         "integer",
      "default":      0,
      "min":          0
    },
    {
      "key":          "gasp_key",
      "section":      "section_non_ui",
      "transferable": false,
      "sensitive":    true,
      "type":         "text",
      "default":      ""
    }
  ],
  "definitions":   {
    "login_intent_timeout":      5,
    "login_intent_max_attempts": 5,
    "events":                    {
      "2fa_verify_success":    {
        "audit_params": [
          "user_login",
          "method"
        ],
        "level":        "notice"
      },
      "2fa_verify_fail":       {
        "audit_params": [
          "user_login",
          "method"
        ],
        "level":        "warning",
        "offense":      true
      },
      "2fa_nonce_verify_fail": {
        "audit_params": [
          "user_login"
        ],
        "level":        "alert",
        "offense":      true
      },
      "cooldown_fail":         {
        "level":   "warning",
        "offense": true
      },
      "honeypot_fail":         {
        "audit_params": [
          "user_login",
          "action"
        ],
        "level":        "warning"
      },
      "botbox_fail":           {
        "audit_params": [
          "user_login",
          "action"
        ],
        "level":        "warning",
        "offense":      true
      },
      "login_block":           {
        "level": "warning"
      },
      "block_register":        {
        "level": "warning"
      },
      "block_lostpassword":    {
        "level": "warning"
      },
      "block_checkout":        {
        "level": "warning"
      },
      "hide_login_url":        {
        "level": "notice"
      },
      "2fa_success":           {
        "level":  "info",
        "recent": true
      }
    }
  }
}