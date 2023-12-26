Feature:
    In order get list of beers that match with a given food
    As a user
    I want to test the beers finder by food

    Scenario: A list of beers should be returned when user search by food
        When a user send a GET call to "/api/beers?food=chips&page=1&per_page=5"
        Then the response should have status code 200
        And the response contains a list named beers
        And the response contains a list named beers with 5 elements

    Scenario: A list of 25 beers should be returned when user search only with page
        When a user send a GET call to "/api/beers?page=1"
        Then the response should have status code 200
        And the response contains a list named beers
        And the response contains a list named beers with 25 elements

    Scenario: A list of N beers should be returned when user search by page and with elements per page limit
        When a user send a GET call to "/api/beers?page=1&per_page=10"
        Then the response should have status code 200
        And the response contains a list named beers
        And the response contains a list named beers with 10 elements
