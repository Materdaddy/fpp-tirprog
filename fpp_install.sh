#!/bin/bash

pushd $(dirname $(which $0))

git submodule init
git submodule update
make -C tirprog

popd
