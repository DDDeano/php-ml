#!/usr/bin/env bash

echo "Here's the OSX environment:"
sw_vers
brew --version

brew install php@7.1
brew upgrade php@7.1
brew link php@7.1 --overwrite --force
