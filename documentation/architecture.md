# Archive Tool architecture

This document attempts to document the architecture of Archive Tool. This is an early draft.

## Terminology

- VKA (Videokunstarkivet)
- PNEK (Produksjonsnettverk for elektronisk kunst)

## Parts

- ResourceSpace
- Yii
- Toxus
- Twig

## Configuration

- ResourceSpace
  - `resourcespace7/include/config.php`
- Yii
  - `site/protected/config/main.php`
- Toxus
  - Yii
  - Some custom

## The meat of the application

- User authentication
  - `site/protected/components/UserIdentity.php`
  - `site/protected/vendors/toxus/components/UserIdentityBase.php`
- Show the files last digitized, download file, …
  - `site/protected/controllers/SiteController.php`
- Send artist invitation, check user rights, …
  - `site/protected/vendors/toxus/controllers/aseSiteController.php`
- Send artist invitation, check user rights, …
  - `site/protected/controllers/AgentController.php`
- DAL
  - `site/protected/models/Agent.php`
  - `site/protected/models/ProcessingJob.php`
  - `site/protected/models/User.php`
- Login logic
  - `site/protected/vendors/toxus/actions/LoginAction.php`
- View
  - `site/protected/vendors/toxus/views/layouts/loginForm.php`
  - `site/protected/views/layouts/userMenu.php`

## Architecture

Archive Tool is mainly built up the following types. Toxus library seems to be used for base types and common web application functionality.

- Models : `CModel`, `CFormModel`, `TwigActiveRecord`, `ArtBase`
  - `UserProfile`
  - `UserProfileModel` (toxus)
- Controllers : `Controller`, `CController`
  - `SiteController`
  - `BaseSiteController` (toxus)
- Components : `CComponent`
  - `UserIdentity`
  - `UserIdentityBase` (toxus)
  - `ReportGrid`
- Console commands : `CConsoleCommand`
- Actions : `CAction`
- Views : Twig, PHP
  - `layouts/main`
  - `layouts/mainBootstrap3.twig` (toxus)
  - `layouts/login.twig` (toxus)
  - `layouts/loginForm.php` (toxus)

## Entry point

- `SiteController`
- `BaseSiteController`
- `LoginAction`
- `LoginForm`
- `LoginFormModel`
- `UserIdentity`
- `UserIdentityBase`
- `formDialog.twig`

## Exclude Filter when searching through code base

resourcespace7,extensions,\*.json,messages,migrations,assetsBase,yii,setup

## Yii concepts

- ActiveRecord
  - ORM entity?

## Might not be Yii

- Twig
  - View template?