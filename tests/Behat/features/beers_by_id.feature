Feature:
    In order get info about a beer
    As a user
    I want to test the beers finder by ID

    Scenario: Details of a beer should be returned for given its ID
        When a user send a GET call to "/api/beers/1"
        Then the response should have status code 200
        And user can see id field in response
        And user can see name field in response
        And user can see tags field in response
        And user can see date field in response
        And user can see description field in response
        And user can see image field in response

    Scenario: Not Found error should returned if given ID doesn't exists
        When a user send a GET call to "/api/beers/0"
        Then the response should have status code 404

