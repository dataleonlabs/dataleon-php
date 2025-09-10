# Changelog

## 0.12.0 (2025-09-10)

Full Changelog: [v0.11.0...v0.12.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.11.0...v0.12.0)

### Features

* **api:** api update ([ce478be](https://github.com/dataleonlabs/dataleon-php/commit/ce478befa1079fcd5987ee50f3ff90d2c3f07289))

## 0.11.0 (2025-09-09)

Full Changelog: [v0.10.0...v0.11.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.10.0...v0.11.0)

### ⚠ BREAKING CHANGES

* expose services and service contracts
* use builders for RequestOptions

### Features

* **client:** use real enums ([0a41f7a](https://github.com/dataleonlabs/dataleon-php/commit/0a41f7a9714ff5eea65580e98ae9e70558b300d7))
* expose services and service contracts ([2a0b38d](https://github.com/dataleonlabs/dataleon-php/commit/2a0b38d4795cc6c39a6eea1d607c4cf7fb445c95))
* use builders for RequestOptions ([758f5f0](https://github.com/dataleonlabs/dataleon-php/commit/758f5f0ff9c2e9e4fc35e1bc53a6b4af741b5e67))


### Bug Fixes

* remove inaccurate `license` field in composer.json ([09967c0](https://github.com/dataleonlabs/dataleon-php/commit/09967c0656f17e135d2d6db2312deb78c327ef00))


### Chores

* add additional php doc tags ([25ca5f1](https://github.com/dataleonlabs/dataleon-php/commit/25ca5f18866b1d99e329516ea7fc3e7e7f71df29))
* cleanup streaming ([5cb8476](https://github.com/dataleonlabs/dataleon-php/commit/5cb847696d639bf211de0f4507a4487256d6942a))
* document parameter object usage ([97be7cf](https://github.com/dataleonlabs/dataleon-php/commit/97be7cf1f4fcf36f20f3229ee0af34a1174a9f6e))
* **internal:** refactor base client internals ([a941051](https://github.com/dataleonlabs/dataleon-php/commit/a9410513ab2b72bc9442d75964ebc5247eaa3491))
* make more targeted phpstan ignores ([8eaa3e0](https://github.com/dataleonlabs/dataleon-php/commit/8eaa3e0f2e01bc3966a627f51046ebed6d0e9f7d))
* refactor request options ([c9179e6](https://github.com/dataleonlabs/dataleon-php/commit/c9179e6a04ba0901f3e11686dada6d0fcec1b14a))
* **refactor:** simplify base page interface ([3220150](https://github.com/dataleonlabs/dataleon-php/commit/3220150e56e532edee1a97ce657233bb4b7a6f8f))
* remove `php-http/multipart-stream-builder` as a required dependency ([65e2cfb](https://github.com/dataleonlabs/dataleon-php/commit/65e2cfbc6e13e99518c2d3875c7571ef2c1b4484))
* simplify model initialization ([f02ab44](https://github.com/dataleonlabs/dataleon-php/commit/f02ab444471f8e3b84f23dde310df95dd15aeb6f))

## 0.10.0 (2025-08-27)

Full Changelog: [v0.9.1...v0.10.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.9.1...v0.10.0)

### Features

* **api:** manual updates ([7852182](https://github.com/dataleonlabs/dataleon-php/commit/785218213a7c27f59d1bcf1fc95a842228d41f32))
* **api:** manual updates ([81ec9e5](https://github.com/dataleonlabs/dataleon-php/commit/81ec9e52c2a82a5ecb157f12206e6de865adec29))

## 0.9.1 (2025-08-27)

Full Changelog: [v0.9.0...v0.9.1](https://github.com/dataleonlabs/dataleon-php/compare/v0.9.0...v0.9.1)

## 0.9.0 (2025-08-27)

Full Changelog: [v0.8.0...v0.9.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.8.0...v0.9.0)

### ⚠ BREAKING CHANGES

* rename errors to exceptions
* pagination field rename, and basic streaming docs

### Features

* **api:** api update ([84fd2c9](https://github.com/dataleonlabs/dataleon-php/commit/84fd2c925e93ee9846b6bebc1c7130fe5a698475))
* **api:** manual updates ([7376dbf](https://github.com/dataleonlabs/dataleon-php/commit/7376dbfa828d1cdc8fd78bb474aeb27cd865da24))
* ensure `-&gt;toArray()` benefits from structural typing ([a20fb15](https://github.com/dataleonlabs/dataleon-php/commit/a20fb1501e34213b2bf2848ff42404ffac1683a2))
* pagination field rename, and basic streaming docs ([bb46f87](https://github.com/dataleonlabs/dataleon-php/commit/bb46f8774cf8234c3d63b738c5e62e2155e67984))
* rename errors to exceptions ([9360446](https://github.com/dataleonlabs/dataleon-php/commit/9360446991f52bb1f4a341d5ebe6a2293c9de3df))


### Bug Fixes

* add create release workflow ([16fd31c](https://github.com/dataleonlabs/dataleon-php/commit/16fd31c0a3bc6bb2757c66bd8bbe40f3baf390a7))

## 0.8.0 (2025-08-27)

Full Changelog: [v0.8.0...v0.8.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.8.0...v0.8.0)

### Bug Fixes

* minor bugs ([606e775](https://github.com/dataleonlabs/dataleon-php/commit/606e77581cff68142265ced8603860e86e8b13a8))

## 0.8.0 (2025-08-27)

Full Changelog: [v0.7.0...v0.8.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.7.0...v0.8.0)

### ⚠ BREAKING CHANGES

* **refactor:** namespacing cleanup
* **refactor:** clean up pagination, errors, as well as request methods

### Features

* **refactor:** clean up pagination, errors, as well as request methods ([567c127](https://github.com/dataleonlabs/dataleon-php/commit/567c127dfc00941625815801b006f9ee68e2f1cc))
* **refactor:** namespacing cleanup ([c72a41a](https://github.com/dataleonlabs/dataleon-php/commit/c72a41a2c9450af3791082a33b260612fd80e35f))


### Bug Fixes

* basic pagination should work ([29cc3ab](https://github.com/dataleonlabs/dataleon-php/commit/29cc3aba87902c48b53022c6b1cda5bc3aaa08e7))


### Chores

* **internal:** refactored internal codepaths ([ae3e069](https://github.com/dataleonlabs/dataleon-php/commit/ae3e0698ca084f665796f8b928b34e9903e3fa72))

## 0.7.0 (2025-08-26)

Full Changelog: [v0.6.0...v0.7.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.6.0...v0.7.0)

### Features

* **php:** differentiate null and omit ([3449384](https://github.com/dataleonlabs/dataleon-php/commit/34493841331e6ab32bbc7c6871a16233315bcdef))


### Bug Fixes

* streaming internals ([bef9033](https://github.com/dataleonlabs/dataleon-php/commit/bef9033357d5a5e997a7391d631a8b9f9e4bb625))


### Chores

* improve model annotations ([bd7518e](https://github.com/dataleonlabs/dataleon-php/commit/bd7518ed8c8eb44f0c4e384267596b1da6bd4f28))
* remove type aliases ([dc70521](https://github.com/dataleonlabs/dataleon-php/commit/dc70521bd1cc1ece8d25e4e4c388339efefad00f))

## 0.6.0 (2025-08-22)

Full Changelog: [v0.5.0...v0.6.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.5.0...v0.6.0)

### Features

* **api:** api update ([6cef35a](https://github.com/dataleonlabs/dataleon-php/commit/6cef35a89b8498e86e343a77573a0d2e6d57b230))

## 0.5.0 (2025-08-22)

Full Changelog: [v0.4.0...v0.5.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.4.0...v0.5.0)

### Features

* **api:** api update ([14c5200](https://github.com/dataleonlabs/dataleon-php/commit/14c52004257d67da7d9ba72cfc2e984fd4cd109b))

## 0.4.0 (2025-08-22)

Full Changelog: [v0.3.0...v0.4.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.3.0...v0.4.0)

### Features

* **api:** api update ([a042fc3](https://github.com/dataleonlabs/dataleon-php/commit/a042fc342148ccce989de9d99b0e7a1f16bc1dc7))

## 0.3.0 (2025-08-21)

Full Changelog: [v0.2.0...v0.3.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.2.0...v0.3.0)

### Features

* **api:** api update ([7d2f202](https://github.com/dataleonlabs/dataleon-php/commit/7d2f2028a9b56beeba05cb799463ab7904770807))
* **client:** add streaming ([c7b07d3](https://github.com/dataleonlabs/dataleon-php/commit/c7b07d3fb28d861766711cd4eeefd7f2bcc9d826))
* **client:** improve error handling ([20a2957](https://github.com/dataleonlabs/dataleon-php/commit/20a2957e6a76432c4021efe3397299a595231647))
* **client:** use named parameters in methods ([fac1deb](https://github.com/dataleonlabs/dataleon-php/commit/fac1deb8026e5e376b82087ab38afda39f444a51))
* **php:** rename internal types ([499dfca](https://github.com/dataleonlabs/dataleon-php/commit/499dfcaaf18409449cf4087ab58382be62387c54))


### Bug Fixes

* **client:** elide null named parameters ([c92fc00](https://github.com/dataleonlabs/dataleon-php/commit/c92fc00cd32bb132d4fefb27f32f4946f2c89a23))


### Chores

* intuitively order union types ([b916a36](https://github.com/dataleonlabs/dataleon-php/commit/b916a36364302b4fbe75d33e48c34a2ace7d4d13))
* readme improvements ([db5d871](https://github.com/dataleonlabs/dataleon-php/commit/db5d8719248bc3b067667b3a1a32144823f86409))

## 0.2.0 (2025-08-15)

Full Changelog: [v0.1.1...v0.2.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.1.1...v0.2.0)

### Features

* **api:** api update ([5b054d9](https://github.com/dataleonlabs/dataleon-php/commit/5b054d9aacf4fb7c6af6463f862a6329545c8371))

## 0.1.1 (2025-08-15)

Full Changelog: [v0.1.1...v0.1.1](https://github.com/dataleonlabs/dataleon-php/compare/v0.1.1...v0.1.1)

### Features

* **api:** api update ([f581a07](https://github.com/dataleonlabs/dataleon-php/commit/f581a07ddcced0a3ecb041e35da124db77ee2110))
* **client:** use with for constructors ([ed15253](https://github.com/dataleonlabs/dataleon-php/commit/ed15253baf190379f4592e9c3e93d75ac5b12332))


### Chores

* fix package name ([e5a5aa5](https://github.com/dataleonlabs/dataleon-php/commit/e5a5aa5ee3767c53b5f0f4b742e95b99c3b382c5))
* **internal:** codegen related update ([1817ee3](https://github.com/dataleonlabs/dataleon-php/commit/1817ee3b085631e655e7529e048ec0e86031c9c1))
* **internal:** codegen related update ([eddaddb](https://github.com/dataleonlabs/dataleon-php/commit/eddaddb83022e912a0158cee83877ba0a382519b))
* **internal:** update comment in script ([050e157](https://github.com/dataleonlabs/dataleon-php/commit/050e1570f5f13496cb2abe8015e528ce0556828e))
* move parameters into models namespace ([2a49a69](https://github.com/dataleonlabs/dataleon-php/commit/2a49a692573b5fa62840b2eb9ecfd15734c54a6d))
* update @stainless-api/prism-cli to v5.15.0 ([8567b62](https://github.com/dataleonlabs/dataleon-php/commit/8567b62f97e21721ffddd0affa72ea7ed03b6c14))

## 0.1.1 (2025-08-06)

Full Changelog: [v0.1.0...v0.1.1](https://github.com/dataleonlabs/dataleon-php/compare/v0.1.0...v0.1.1)

### Bug Fixes

* **client:** rename param to params ([0b1cea7](https://github.com/dataleonlabs/dataleon-php/commit/0b1cea76448ce0eb163192d04bfeb6d6ae504522))

## 0.1.0 (2025-08-05)

Full Changelog: [v0.0.2...v0.1.0](https://github.com/dataleonlabs/dataleon-php/compare/v0.0.2...v0.1.0)

### Features

* **api:** api update ([f0f38ed](https://github.com/dataleonlabs/dataleon-php/commit/f0f38ed43c3add6375c65c6a353ffdef838ed956))
* **api:** api update ([f7b0261](https://github.com/dataleonlabs/dataleon-php/commit/f7b026153a2e393c33c4ea3ce7962cf334daa86a))

## 0.0.2 (2025-08-05)

Full Changelog: [v0.0.1...v0.0.2](https://github.com/dataleonlabs/dataleon-php/compare/v0.0.1...v0.0.2)

### Features

* **api:** api update ([0740312](https://github.com/dataleonlabs/dataleon-php/commit/07403129c45088bf8bfdb734c5fedc795be0e614))
* **api:** api update ([c6929e4](https://github.com/dataleonlabs/dataleon-php/commit/c6929e469d2228f44a834c40dbd432c68029d122))
* **api:** manual updates ([16a081d](https://github.com/dataleonlabs/dataleon-php/commit/16a081d4ff0a30696ac3153dce066cd61e5660de))
* **api:** manual updates ([dd0f306](https://github.com/dataleonlabs/dataleon-php/commit/dd0f306829cdb8f54c72224bae5e9472bc8403b7))
* **api:** manual updates ([c594682](https://github.com/dataleonlabs/dataleon-php/commit/c594682c0de9c22860d6015da758f30b694a9d5b))


### Chores

* configure new SDK language ([c591679](https://github.com/dataleonlabs/dataleon-php/commit/c59167947c5f92223ddf14645cd7d5a1559e920b))
* update SDK settings ([d594df7](https://github.com/dataleonlabs/dataleon-php/commit/d594df7db55012b3d9f5cb6db5e68d2d9df24f5e))
