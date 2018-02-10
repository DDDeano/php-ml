# Variance Threshold

`VarianceThreshold` is a simple baseline approach to feature selection. 
It removes all features whose variance doesn’t meet some threshold. 
By default, it removes all zero-variance features, i.e. features that have the same value in all samples.

## Constructor Parameters

* $threshold (float) - features with a variance lower than this threshold will be removed (default 0.0)

```php
$transformer = new VarianceThreshold(0.15);
```

## Example of use

As an example, suppose that we have a dataset with boolean features and 
we want to remove all features that are either one or zero (on or off)
in more than 80% of the samples. 
Boolean features are Bernoulli random variables, and the variance of such 
variables is given by
```
Var[X] = p(1 - p)
```
so we can select using the threshold .8 * (1 - .8):

```php
$samples = [[0, 0, 1], [0, 1, 0], [1, 0, 0], [0, 1, 1], [0, 1, 0], [0, 1, 1]];
$transformer = new VarianceThreshold(0.8 * (1 - 0.8));

$transformer->fit($samples);
$transformer->transform($samples);

/*
$samples = [[0, 1], [1, 0], [0, 0], [1, 1], [1, 0], [1, 1]];
*/
```

## Pipeline

`VarianceThreshold` implements `Transformer` interface so can be used as part of pipeline:

```php

```
