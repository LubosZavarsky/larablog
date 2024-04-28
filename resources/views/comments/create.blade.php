'use strict';
const { list } = require('postcss');
const { unit } = require('postcss-value-parser');
const stylehacks = require('stylehacks');
const canMerge = require('../canMerge');
const getDecls = require('../getDecls');
const getValue = require('../getValue');
const mergeRules = require('../mergeRules');
const insertCloned = require('../insertCloned');
const remove = require('../remove');
const isCustomProp = require('../isCustomProp');
const canExplode = require('../canExplode');

const properties = ['column-width', 'column-count'];
const auto = 'auto';
const inherit = 'inherit';

/**
 * Normalize a columns shorthand definition. Both of the longhand
 * properties' initial values are 'auto', and as per the spec,
 * omitted values are set to their initial values. Th