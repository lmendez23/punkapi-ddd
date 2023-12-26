# PUNKAPI - DDD

This project builds a simple API Rest to get a list of beers that match with a food and get the detail of a specific beer.

## Requirements

- [X] Symfony Framework
- [X] API REST and JSON output
- [X] FIELDS : [id, name, tagline, first_brewed, description, image]
- [X] Hexagonal architecture and DDD
- [X] PSR-2 standard
- [X] Unit tests (mocking PunkAPI)

## Extra requirements
- [ ] Cache PunkAPI requests temporarily using FileSystem or Redis.
- [X] Documentation with OpenAPI (NelmioAPIBundle).
- [ ] Functional tests with Behat.

## Pending Tasks
- [ ] Add Requests classes
- [ ] Add Responses classes
- [ ] Cache PunkAPI requests temporarily using FileSystem or Redis.
- [ ] Create functional tests with Behat.

## Tasks completed
- [X] Project initialization with Symfony 6.4.
- [X] PunkAPI review and analysis.
- [X] Add php-cs-fixer, PHPUnit and Guzzle dependencies.
- [X] Folder structure.
- [X] Add Beer model.
- [X] Add repository interface.
- [X] Add PunkAPI client.
- [X] Add repository implementation and unit test.
- [X] Add application service to search a beer by a string (the field to filter will be "food").
- [X] Add application service to get details of a specific beer by ID.
- [X] Add unit test to search a beer by a string (the field to filter will be "food").
- [X] Add unit test to get details of a specific beer by ID.
- [X] API Documentation with OpenAPI (NelmioAPIBundle).
