# Changelog
All notable changes to this project will be documented in this file.

## [Unreleased]

## [1.3.9] - 02-04-2020
### Added
- Report download will use some [company, date to, date from] PO filter options

## [1.3.8] - 12-03-2020
### Added
- Single date filter re-added

## [1.3.7] - 11-03-2020
### Added
- Job and finance statuses added to P/O edit for SA to assign
 - Two new DB columns in pos table added for the above

### Removed
- Single date filter option, no need for this with the ability to search using date range

## [1.3.6] - 10-03-2020
### Added
- Sending second confirmation email to company contact email
- Time stamp attached to created P/O confirmation page
- Allow admin level user to edit other users permission level

## [1.3.5] - 09-03-2020
### Changed
- Added extra validation on Purchase Order creation to stop an error at SA level

## [1.3.4] - 26-02-2020
### Added
- Company admin to see EM Invoice

## [1.3.3] - 20-02-2020
### Added
- Ability for tech and admin users to export Purchase Order history

## [1.3.2] - 20-02-2020
### Fixed
- Pagination error when filtering Purchase Orders

## [1.3.1] - 20-02-2020
### Added
- Merchant ID showing on Purchase Order Confirmation page

## [1.3] - 19-02-2020
### Added
- README updated to include changelog
- Version number to branding title to match release version
- Note filed for each Purchase Orders, added data to CSV export
- Function to cancel Purchase Orders
- Input field for Purchase Order cost sheet, top level users only, added data to CSV export
- Input field for Purchase Order EM invoice number, top level users only, added data to CSV export
- Link to navigation, with new icon, to manage/view Notifications
- Feature to add a notification that will appear on the dashboard
- Feature to view all notifications and edit
- Date range filter on Purchase Order list
- On P/O create, the submit button will change to 'please wait' to avoid multiple pressed if delay completing

### Changed
- Amount of results shown when filtering Purchase Orders
