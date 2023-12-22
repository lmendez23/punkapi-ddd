# PUNKAPI - DDD

This project builds a simple API Rest to get a list of beers that match with a food and get the detail of a specific beer.

## Requirements

- [X] Symfony Framework
- [ ] API REST and JSON output
- [ ] FIELDS : [id, name, tagline, first_brewed, description, image]
- [ ] Hexagonal architecture and DDD
- [ ] PSR-2 standard
- [ ] Unit tests (mocking PunkAPI)

## Extra requirements
- [ ] Cache PunkAPI requests temporarily using FileSystem or Redis.
- [ ] Documentation with OpenAPI (NelmioAPIBundle).
- [ ] Functional tests with Behat.

## Pending Tasks
- [ ] Folder structure.
- [ ] Add Beer model.
- [ ] Add PunkAPI client.
- [ ] Add repository interface.
- [ ] Add repository implementation and unit test.
- [ ] Add application service and unit test to search a beer by a string (the field to filter will be "food").
- [ ] Add application service and unit test to get details of a specific beer by ID.
- [ ] Cache PunkAPI requests temporarily using FileSystem or Redis.
- [ ] Build API documentation with OpenAPI.
- [ ] Create functional tests with Behat.

## Tasks completed
- [X] Project initialization with Symfony 6.4.
- [X] PunkAPI review and analysis.
- [X] Add php-cs-fixer, PHPUnit and Guzzle dependencies.
