# Change Log

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/).

## [Unreleased]

* Added: XCG Caribbean Guilder (CW, SX) and VED Venezuelan Digital Bolívar (VE)
* Removed: currencies withdrawn from ISO 4217: ANG, BGN, CUC, HRK, LVL and SLL;
  looking them up now throws `OutOfBoundsException`
* Changed: added HR and XK to EUR, BT to INR, and HT, IO and PA to USD
* Changed: renamed 'Sierra Leonean Leone (new)' to 'Sierra Leonean Leone'

## [4.4.0] - 2026-11-02

* Added: `getByCountry()` returns every currency used in a country (ISO 3166-1 alpha2)
* Added: `ISO4217` implements `Countable` and `IteratorAggregate`
* Added: `Alcohol\ISO4217\Exception\DomainException` and `OutOfBoundsException`, which extend
  the SPL exceptions thrown so far and implement the `Alcohol\ISO4217\Exception`
  marker interface; existing `catch` blocks and exception messages are unaffected
* Changed: tests moved to `tests/` and excluded, together with tooling and CI config, from release archives
* Changed: php-cs-fixer uses `@PER-CS` instead of `@PSR2`, PHPStan 2 now also analyses the tests
* Changed: CI runs once per pull request, with read-only permissions, and uploads coverage from a single job
* Changed: CI no longer runs a `prefer-lowest` PHPUnit matrix (there are no runtime dependencies to test at their lowest versions)

## [4.3.1] - 2026-10-26

* Changed: dependency updates for CI (actions/checkout 7, codecov/codecov-action 7) and tooling

## [4.3.0] - 2026-01-02

* Changed: added Bulgaria to EUR
* Added: support for PHPUnit 10, 11 and 12
* Added: CI for PHP 8.4 and 8.5

## [4.2.0] - 2024-07-01

* Added: ZWG for Zimbabwe Gold

## [4.1.0] - 2023-02-28

* Added: argument type hint for getByCode()
* Changed: updated SLL and added SLE

## [4.0.0] - 2020-01-06

* Deprecated: dropped support for PHP 7.3 and lower
* Added: support for PHP 8
* Added: return type hints

## [3.1.5] - 2019-10-30

* Changed: added Latvia and Estonia to EUR

## [3.1.4] - 2019-04-30

* Changed: updated exponent value of RSD

## [3.1.3] - 2019-04-30

* Changed: updated exponent value of MGA and MRU

## [3.1.2] - 2019-04-01

* Changed: updated README
* Changed: added accent on Venezuelan Bolívar
* Changed: VEF superseded by VES
* Changed: STD superseded by STN
* Changed: MRO superseded by MRU

## [3.1.1] - 2017-12-01

* Changed: BYR superseded by BYN

## [3.1.0] - 2015-11-04

* Changed: renamed 'Croatian Kuna' to 'Kuna'.
* Changed: renamed 'Romanian New Lue' to 'Romanian Lue'.

## [3.0.0] - 2015-09-05

* Added: CHANGELOG.
* Changed: exceptions to better reflect the error they represent.
* Changed: dropped support for PHP 5.3, switched to short array notation.

## [2.1.0] - 2015-07-31

* Changed: removed Lithuanian currency.

[Unreleased]: https://github.com/alcohol/iso4217/compare/4.4.0...HEAD
[4.4.0]: https://github.com/alcohol/iso4217/compare/4.3.1...4.4.0
[4.3.1]: https://github.com/alcohol/iso4217/compare/4.3.0...4.3.1
[4.3.0]: https://github.com/alcohol/iso4217/compare/4.2.0...4.3.0
[4.2.0]: https://github.com/alcohol/iso4217/compare/4.1.0...4.2.0
[4.1.0]: https://github.com/alcohol/iso4217/compare/4.0.0...4.1.0
[4.0.0]: https://github.com/alcohol/iso4217/compare/3.1.5...4.0.0
[3.1.5]: https://github.com/alcohol/iso4217/compare/3.1.4...3.1.5
[3.1.4]: https://github.com/alcohol/iso4217/compare/3.1.3...3.1.4
[3.1.3]: https://github.com/alcohol/iso4217/compare/3.1.2...3.1.3
[3.1.2]: https://github.com/alcohol/iso4217/compare/3.1.1...3.1.2
[3.1.1]: https://github.com/alcohol/iso4217/compare/3.1.0...3.1.1
[3.1.0]: https://github.com/alcohol/iso4217/compare/3.0.0...3.1.0
[3.0.0]: https://github.com/alcohol/iso4217/compare/2.1.0...3.0.0
[2.1.0]: https://github.com/alcohol/iso4217/compare/2.0.2...2.1.0
