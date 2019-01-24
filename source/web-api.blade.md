---
title: Web API
description: Update your player profile
extends: _layouts.documentation
---

Any time your player exits the server, whether from self logout, server reset, or inactivity, your player profile is saved through the Web API located on `delaford.com`.

The Web API is in the [/website](https://github.com/delaford/website) part of the Repository and part of the is the `AuthController`.

## Methods

@include('_partials.class-table', [
	'headers' => ['API', 'Description'],
	'rows' => [
		[
			'/login',
			"Login player via password assertion",
		],
		[
			'/logout',
			"Logout player via JWT token.",
		],
		[
			'/refresh',
			"Refresh a player's JWT token."
		],
		[
			'/me',
			"Grabs the latest player data and returns the JSON."
		],
		[
			'/update',
			"Updates the player data with new data."
		]
	]
])

## JWT Tokens

When players login, we use [JWT tokens](https://jwt.io/) to authenticate player sessions. Any subsequent calls need to use the JWT token to the assigned player ID to be able to perform an API call.

We are currently using the [tymon/jwt-auth](https://packagist.org/packages/tymon/jwt-auth) for JWT tokens.

## Guest sessions

To be able to play the game, you do not need to download the `/website` repository and make use of these JWT tokens. The `/game` repository provides their own JSON player profile, located in `server/core/data/helpers/player.json`, so you can play as a Guest and quickly get into the game using that data.