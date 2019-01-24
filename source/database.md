---
title: Database
description: null
extends: _layouts.documentation
---

Every single piece of data relating to the player is saved in a MySQL database through the Laravel API that is in the `/website` [repository](https://github.com/delaford/website).

When you logout, or are booted off, the player file gets updated through the Node.js server and your data is updated through a basic `HTTP` call.

## Guest Account

When you login, you have the ability to login and skip the database by ticking `Guest Account?` box on the lower left-hand side. This pre-loads the game with an already-created player profile as if you had just created a new player.

When you logout, nothing is saved because there is no player ID attached to the profile. The guest account is good for quick edits and instances where player profiles are not needed to be saved.

You cannot login with two guest accounts at this time.