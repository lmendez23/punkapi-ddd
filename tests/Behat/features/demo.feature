# This file contains a user story for demonstration only.
# Learn how to get started with Behat and BDD on Behat's website:
# http://behat.org/en/latest/quick_start.html

Feature:
    In order to prove I can write a behat test
    As a user
    I want to test the homepage

    Scenario: I go to the homepage
        When a demo scenario sends a request to "/"
        Then the response should be received
