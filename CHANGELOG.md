# Changelog
All notable changes to this project will be documented in this file.
 - Style Conventions
   - 4 space indentation
   - Changes are grouped by commit date in descending order.
   - Oldest changes come first within each group but the order don't really matter.

# [latest version 4.0.0]

## [version 4.0.0 released] - 2017-11-16

## [4.0.0] - 2017-11-16
 - Added an XML documents as data source.
 - Added XML_Model.php
 - Enabled XML_Model to save data into an XML data file.
 - Enabled XML_Model to load data from an XML data file.
 - Updated Tasks.php model to use tasks.xml file.

## [version 3.0.0 released] - 2017-11-04

## [3.0.0] - 2017-11-04
 - Added TaskListTest.php to test incomplete tasks compared to completed tasks.
 - Updated phpunit.xml.dist to generate code coverage reports.
 - Updated .gitignore to ignore generated code coverage reports.
 - Added .travis.yml to enable Travis-CI to perform unit test for every push to repo.
 - Create a unit test plan for task entity.

## [3.0.0] - 2017-11-02
 - Integrated PHPUnit for unit test.

## [version 2.0.0 released] - 2017-10-20

## [2.0.0] - 2017-10-19
 - Fixed Bootstrap bug.
 - Added Mtce controller for Maintenance page.
 - Added itemlist view and oneitem view to format data for the Maintenance page.
 - Updated config/config.php to include link to Maintenance page.
 - Added Roles controller to handle different user roles.
 - Added constants 'Guest' and 'Owner' for user roles
 - Updated _menubar view to include Roles dropdown menu
 - Updated config/config.php and autoload.php so that user roles will work.
 - Added pagination in maintenance page.
 - Enabled task-completion in task list page.
 - Updated maintenance page to enable role-specific list on it.
 - Fixed model bug.
 - Enabled task item maintenance.
 - Updated Mtce controller and itemedit view to include size, group and status fields.
 - Fixed bug in Memory_Model.php.
 - Fixed category list checkbox in Views controller.

## [version 1.0.0 released] - 2017-10-12

## [1.0.0] - 2017-10-12
 - Initialized the project by forking from: https://github.com/jedi-academy/starter-todo4.
 - Added a data model to retrieve data from a csv file.
 - Updated base controller to allow for pre-rendered content.
 - Updated homepage view to include alert of unfinished tasks and table of 5 tasks to do.
 - Updated Welcome controller to count unfinished tasks and get 5 tasks to do.
 - Updated Help wanted page to be able to display a markdown style wanting ad list.
 - Added template_secondary view to display sorted task panels.
 - Updated base controller to fix bug.
 - Added Views controller to display sorted task panels.
 - Added by_priority view for tasks list sorted by priority.
 - Added by_category view for tasks list sorted by category.
 - Updated Tasks model with function to generate tasks list ordered by category.
