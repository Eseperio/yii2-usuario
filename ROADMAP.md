# Roadmap for yii2-usuario v2.0.0

This document outlines the pending tasks and improvements planned for the v2.0.0 release.

## Completed Tasks ✅

- [x] Decouple UI framework from core logic (PR #2)
- [x] Add support for Bootstrap 3, Bootstrap 5, and framework-independent views
- [x] Make Bootstrap dependencies optional in composer.json
- [x] Add `uiFramework` parameter for framework selection
- [x] Create basic/semantic views with no framework dependencies

## Pending Tasks 📋

### Documentation

- [x] Complete "Separate Frontend and Backend Sessions" guide (`docs/guides/separate-frontend-and-backend-sessions.md`)

### API Improvements

- [x] Implement missing REST API actions in `AdminController` (`src/User/Controller/api/v1/AdminController.php`):
  - [x] `Info` action
  - [x] `SwitchIdentity` action  
  - [x] `Assignments` POST method (currently only GET is implemented)

## Future Considerations 🔮

Based on open issues in the upstream repository, the following items may be considered for future releases:

- Improve User/Profile relationship with `inverseOf` for better performance (#571)
- Add mailer component configuration option instead of hardcoding (#504)
- Make SwitchIdentityService available for override in ClassMap (#528)
- Support for additional authentication providers (Firebase, Xero, etc.)
- Bootstrap 4 compatibility (if needed)
- Tailwind CSS theme support

## Release Plan

Once all pending tasks are completed:
1. Update CHANGELOG.md with v2.0.0 changes
2. Update documentation
3. Tag v2.0.0 release
4. Announce breaking changes and migration guide
